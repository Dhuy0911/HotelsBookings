<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{

    public function index($hotelId, $roomId)
    {
        $room = DB::table('rooms')
            ->where('hotels_id', $hotelId)->where('id', $roomId)->first();
        $hotels = DB::table('hotels')->where('id', $hotelId)->first();
        $serviceIds = DB::table('room_services')->where('rooms_id', $roomId)->pluck('service_id')->toArray();
        $services = DB::table('services')->whereIn('id', $serviceIds)->get();
        $room_image = DB::table('room_image')->where('rooms_id', $roomId)->get();

        $room_bed_type = DB::table('room_bed_types')
            ->join('bed_types', 'bed_types.id', '=', 'room_bed_types.bed_type_id')
            ->where('rooms_id', $roomId)
            ->select(
                'bed_types.name as bed_name',
                'room_bed_types.quantity as quantity'
            )
            ->first();

        return view('modules.client.hotels.rooms.rooms', [
            'room' => $room,
            'services' => $services,
            'hotelId' => $hotelId,
            'hotels' => $hotels,
            'room_bed_type' => $room_bed_type,
            'room_image' => $room_image
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->except(
            '_token',
            'service',
            'image',
            'bed_type_id',
            'quantity'
        );
        $userId = Auth::user()->id;
        $hotelsId = DB::table('hotels')->where('user_id', $userId)->first()->id;
        $data['created_at'] = new \DateTime;
        $data['hotels_id'] = $hotelsId;

        $room_id = DB::table('rooms')->insertGetId($data);
        $bed_type = $request->only(
            'bed_type_id',
            'quantity'
        );
        $bed_type['rooms_id'] = $room_id;
        DB::table('room_bed_types')->insert($bed_type);

        if ($request->hasFile('image')) {
            $images = [];
            foreach ($request->file('image') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('image/rooms'), $filename);
                $images[] = $filename;
                DB::table('room_image')->insert([
                    'rooms_id' => $room_id,
                    'image' => $filename
                ]);
            }
        }


        if (is_array($request->service)) {
            foreach ($request->service as $service) {
                DB::table('room_services')->insert([
                    'rooms_id' => $room_id,
                    'service_id' => $service
                ]);
            }
        }

        return redirect()->route('hotels.roomlist.list')->with('success', 'create room success');
    }
    public function confirmbooking($hotelId, $roomId)
    {
        $room = DB::table('rooms')
            ->where('hotels_id', $hotelId)->where('id', $roomId)->first();
        $hotels = DB::table('hotels')->where('id', $hotelId)->first();
        return view('partials.client.modal-confirm', compact('room', 'hotels'));
    }
}
