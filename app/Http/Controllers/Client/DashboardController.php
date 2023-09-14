<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Trang dashboard cho chủ khách sạn
    }
    public function reservations($idUser)
    {
        $idUser = Auth::user()->id;
        $hotels = DB::table('hotels')->where('user_id', $idUser)->get();
        $hotelsId = $hotels->pluck('id');
        $locations = DB::table('locations')->get();
        $bookings = DB::table('bookings')
            ->join('rooms', 'rooms.id', '=', 'bookings.room_id')
            ->select(
                'bookings.*',
                'rooms.name as rooms_name',
            )->whereIn('bookings.hotels_id', $hotelsId)->orderBy('created_at', 'DESC')
            ->get();


        return view('modules.client.hotels-dashboard.reservation', [
            'hotels' => $hotels,
            'locations' => $locations,
            'bookings' => $bookings,
        ]);
    }
    public function confirmReservation($idBookings)
    {
        DB::table('bookings')->where('id', $idBookings)->update(['status' => 1]);
        return redirect()->back()->with('success', 'Edit status successfully');
    }
    public function doneReservation($idBookings)
    {
        DB::table('bookings')->where('id', $idBookings)->update(['status' => 3]);
        return redirect()->back()->with('success', 'Edit status successfully');
    }
    public function cancelReservation($idBookings)
    {
        DB::table('bookings')->where('id', $idBookings)->update(['status' => 4]);
        return redirect()->back()->with('success', 'Edit status successfully');
    }
    public function noshowReservation($idBookings)
    {
        DB::table('bookings')->where('id', $idBookings)->update(['status' => 5]);
        return redirect()->back()->with('success', 'Edit status successfully');
    }


    public function historyReservation($idUser)
    {
        $idUser = Auth::user()->id;
        $hotels = DB::table('hotels')->where('user_id', $idUser)->get();
        $hotelsId = $hotels->pluck('id');
        $locations = DB::table('locations')->get();
        $bookings = DB::table('bookings')
            ->join('rooms', 'rooms.id', '=', 'bookings.room_id')
            ->select(
                'bookings.*',
                'rooms.name as rooms_name',
            )->whereIn('bookings.hotels_id', $hotelsId)->orderBy('created_at', 'DESC')
            ->get();

        return view('modules.client.hotels-dashboard.history-reservation', [
            'hotels' => $hotels,
            'locations' => $locations,
            'bookings' => $bookings,
        ]);
    }
    public function showBooking()
    {
        $locations = DB::table('locations')->get();
        $user_id = Auth::user()->id;
        $bookings = DB::table('bookings')
            ->join('hotels', 'hotels.id', '=', 'bookings.hotels_id')
            ->join('rooms', 'rooms.id', '=', 'bookings.room_id')
            ->select('bookings.*', 'hotels.name as hotels_name', 'rooms.name as rooms_name')
            ->where('bookings.user_id', $user_id)
            ->orderBy('created_at', 'DESC')
            ->get();
        foreach ($bookings as $item) {
            $booking = $item->status;
            dd($booking);
        }
        $bookingsCount = $bookings ? count($bookings) : 0;



        return view('modules.client.user-dashboard.my-bookings.bookings', [
            'bookings' => $bookings,
            'locations' => $locations,
            'bookingsCount' => $bookingsCount,
        ]);
    }
    public function cancelBookings($idBookings)
    {
        DB::table('bookings')->where('id', $idBookings)->update(['status' => 4]);
        return redirect()->back()->with('success', 'Canceled Successfully');
    }
    public function historyBooking()
    {

        $user_id = Auth::user()->id;

        $locations = DB::table('locations')->get();
        $bookings = DB::table('bookings')
            ->join('hotels', 'hotels.id', '=', 'bookings.hotels_id')
            ->join('rooms', 'rooms.id', '=', 'bookings.room_id')
            ->select('bookings.*', 'hotels.name as hotels_name', 'rooms.name as rooms_name')
            ->where('bookings.user_id', $user_id)->where('bookings.status', '!=', 1)->get();
        return view('modules.client.user-dashboard.my-bookings.history-bookings', ['bookings' => $bookings, 'locations' => $locations]);
    }
    public function roomlist()
    {
        $idUser = Auth::user()->id;
        $hotels = DB::table('hotels')->where('user_id', $idUser)->get();
        $hotelsId = $hotels->pluck('id')->toArray();
        $rooms = DB::table('rooms')->where('hotels_id', $hotelsId)->get();

        $roomsId = $rooms->pluck('id')->toArray();
        // foreach ($roomsId as $key => $value) {

        //     $room_image = DB::table('room_image')->where('rooms_id', $value)->get();
        //     $rooms[$key]->room_image = $room_image;
        // }

        $locations = DB::table('locations')->get();
        $services = DB::table('services')->get();
        $room_services = DB::table('room_services')
            ->join('rooms', 'rooms.id', '=', 'room_services.rooms_id')
            ->join('services', 'services.id', '=', 'room_services.service_id')
            ->select(
                'services.*',
                'rooms.id as rooms_id'
            )
            ->where('rooms.hotels_id', $hotelsId)->get();
        $bed_types = DB::table('bed_types')->get();
        $tempArr = [];
        $room_image = DB::table('room_image')->whereIn('rooms_id', $roomsId)->get();
        // $image = $room_image->pluck('image')->toArray();


        return view('modules.client.hotels-dashboard.room-list.room-list', compact(
            'locations',
            'room_services',
            'services',
            'rooms',
            'hotels',
            'tempArr',
            'hotelsId',
            'bed_types',
            'room_image',

        ));
    }
    public function updateStatus(Request $request, $roomId)
    {
        $data = $request->except('_token');

        DB::table('rooms')->where('id', $roomId)->update($data);


        // Cập nhật thành công, trả về response tùy ý (ví dụ: JSON response)
        return response()->json(['message' => 'Update status successfully']);
    }
    public function editRoom($id)
    {

        // $idUser = Auth::user()->id;
        // $hotels = DB::table('hotels')->where('user_id', $idUser)->get();
        // $hotelsId = $hotels->pluck('id')->toArray();
        $rooms = DB::table('rooms')->where('rooms.id', $id)->first();
        $services = DB::table('services')->get();
        $room_services = DB::table('room_services')
            ->where('rooms_id', $id)
            ->pluck('service_id')
            ->toArray();


        $locations = DB::table('locations')->get();
        $bed_types = DB::table('bed_types')->get();
        $room_bed_type = DB::table('room_bed_types')
            ->join('bed_types', 'bed_types.id', '=', 'room_bed_types.bed_type_id')
            ->select(
                'room_bed_types.*',
                'bed_types.id as bed_type_id',
                'bed_types.name as bed_type_name'
            )
            ->where('rooms_id', $id)->first();

        $tempArr = [];

        // $room_image = DB::table('room_image')->whereIn('rooms_id', $id)->get();
        return view('modules.client.hotels-dashboard.room-list.edit-room', compact(
            'bed_types',
            'room_services',
            'services',
            'rooms',
            'room_bed_type',
            'locations',
            'tempArr'
        ));
    }
    public function updateRoom(Request $request, $id)
    {
        $data = $request->except(
            '_token',
            'service',
            'bed_type_id',
            'quantity',
        );
        $data['updated_at'] = new \Datetime;

        DB::table('room_services')
            ->where('rooms_id', $id)
            ->delete();

        foreach ($request->service as $service) {
            DB::table('room_services')->insert([
                'rooms_id' => $id,
                'service_id' => $service
            ]);
        }
        DB::table('room_bed_types')->where('rooms_id', $id)->update([
            'bed_type_id' => $request->bed_type_id,
            'quantity' => $request->quantity
        ]);



        if ($request->hasFile('image')) {
            $images = [];
            DB::table('room_image')->where('rooms_id', $id)->delete();
            foreach ($request->file('image') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('image/rooms'), $filename);
                $images[] = $filename;
                DB::table('room_image')->insert([
                    'rooms_id' => $id,
                    'image' => $filename
                ]);
            }
        }
        DB::table('rooms')->where('id', $id)->update($data);
        return redirect()->route('hotels.roomlist.list')->with('message', 'Update room successfully');
    }
}
