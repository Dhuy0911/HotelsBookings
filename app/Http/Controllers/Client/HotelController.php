<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Hotels\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class HotelController extends Controller
{
    public function index()
    {

        $user_id = Auth::id();
        $hotels = DB::table('hotels')
            ->join('users', 'hotels.user_id', '=', 'users.id')
            ->join('user_info', 'users.id', '=', 'user_info.user_id')
            ->select('hotels.*', 'user_info.name as user_name')
            ->where('users.id', $user_id) // Lọc ra chỉ các khách sạn của user đang đăng nhập
            ->orderBy('created_at', 'DESC')
            ->get();

        $placeTypes = DB::table('place_types')->get();
        $locations = DB::table('locations')->get();
        $request = DB::table('reg_owner')->where('user_id', $user_id)->first();



        $status = $request ? $request->status : null;
        foreach ($hotels as $hotel) {
            $hotel_id = $hotel->id;
        }
        // $hotel_image = DB::table('hotel_image')->where('hotels_id',$hotel_id)->get();







        return view('modules.client.hotels-dashboard.index', [
            'hotels' => $hotels,
            'locations' => $locations,
            'status' => $status,
            'placetypes' => $placeTypes,
            // 'hotel_image' => $hotel_image
        ]);
    }


    public function create()
    {
        $facilities = DB::table('facilities')->get();
        $locations = DB::table('locations')->get();
        $services = DB::table('services')->get();
        $placeTypes = DB::table('place_types')->get();
        $poclicies = DB::table('policies')->get();

        return view('modules.client.hotels-dashboard.create', [
            'facilities' => $facilities,
            'locations' => $locations,
            'services' => $services,
            'placetypes' => $placeTypes,
            'policies' => $poclicies
        ]);
    }

    public function info($id)
    {
        $roomsId = DB::table('rooms')->where('hotels_id', $id)->pluck('id')->toArray();
        $room_image = DB::table('room_image')->whereIn('rooms_id', $roomsId)->get();



        $hotels = DB::table('hotels')
            ->join('users', 'hotels.user_id', '=', 'users.id')
            ->join('user_info', 'users.id', '=', 'user_info.user_id')
            ->join('locations', 'locations.id', '=', 'hotels.location_id')
            ->select(
                'hotels.*',
                'user_info.name as user_name',
                'user_info.image as user_image',
                'locations.name as location_name'
            )
            ->where('hotels.id', $id)
            ->first();
        $hotels_facilities = DB::table('hotels_facilities')
            ->join('facilities', 'facilities.id', '=', 'hotels_facilities.facilities_id')
            ->join('hotels', 'hotels.id', '=', 'hotels_facilities.hotels_id')
            ->select(
                'facilities.*',
            )
            ->where('hotels.id', $id)
            ->get();


        $rooms = DB::table('rooms')
            ->join('hotels', 'hotels.id', '=', 'rooms.hotels_id')
            ->join('room_services', 'room_services.rooms_id', '=', 'rooms.id')
            ->join('services', 'services.id', '=', 'room_services.service_id')
            ->select(
                'rooms.id',
                'hotels.id as hotel_id',
                'rooms.name',
                'rooms.price',
                'rooms.status',
                'rooms.persons',
                'rooms.description',
                'services.name as services_name',
                'services.description as services_icon',

                DB::raw("GROUP_CONCAT(services.name SEPARATOR ', ') as services_name"),
                DB::raw("GROUP_CONCAT(services.description SEPARATOR ', ') as services_icon")

            )
            ->where('hotels.id', $id)
            ->groupBy(
                'rooms.id',
                'hotels.id',
                'rooms.name',
                'rooms.price',
                'rooms.status',
                'rooms.description',
                'rooms.persons',
                'services.name',
                'services.description',

            )
            ->get();
        $room_services = DB::table('room_services')
            ->join('rooms', 'rooms.id', '=', 'room_services.rooms_id')
            ->join('services', 'services.id', '=', 'room_services.service_id')
            ->select(
                'services.*',
                'rooms.id as rooms_id'
            )
            ->where('rooms.hotels_id', $id)->get();

        $hotels_policies = DB::table('hotel_policies')
            ->join('policies', 'policies.id', '=', 'hotel_policies.policy_id')
            ->select(
                'policies.*',
                'hotel_policies.*'
            )
            ->where('hotel_id', $id)->get();

        $hotels_timings = DB::table('hotel_timings')->where('hotel_id', $id)->get();

        foreach ($hotels_timings as $value) {
            $value->checkin_time_from = date("H:i", strtotime($value->checkin_time_from));
            $value->checkin_time_until = date("H:i", strtotime($value->checkin_time_until));
            $value->checkout_time_from = date("H:i", strtotime($value->checkout_time_from));
            $value->checkout_time_until = date("H:i", strtotime($value->checkout_time_until));
            $value->reception_time_from = date("H:i", strtotime($value->reception_time_from));
            $value->reception_time_until = date("H:i", strtotime($value->reception_time_until));
        }


        $hotel_image = DB::table('hotel_image')->where('hotels_id', $id)->get();

        // $wether = DB::table('hotels')
        //     ->join('locations', 'locations.id', '=', 'hotels.location_id')
        //     ->select('locations.name as location_name')
        //     ->where('location_id', $hotels->location_id)->first();

        $locations = DB::table('locations')->get();
        $tempArr = [];
        return view('modules.client.hotels.hotels-information.info', [
            'id' => $id,
            'hotels' => $hotels,
            'tempArr' => $tempArr,
            'room_services' => $room_services,
            'rooms' => $rooms,
            'hotels_facilities' => $hotels_facilities,
            'locations' => $locations,
            'room_image' => $room_image,
            'hotels_policies' => $hotels_policies,
            'hotels_timings' => $hotels_timings,
            'hotel_image' => $hotel_image,
            // 'wether' => $wether
        ]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();

        $data = $request->except(
            '_token',
            'checkin_time_from',
            'checkin_time_until',
            'checkout_time_from',
            'checkout_time_until',
            'reception_time_from',
            'reception_time_until',
            'policy_id',
            'facilities',
            'image',
        );

        $data['created_at'] = new \DateTime; // cập nhật thời gian tạo mới nhất 
        $data['user_id'] = $user_id;
        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image/hotels'), $filename);
            $data['main_image'] = $filename;
        }

        $timings = $request->only(
            'checkin_time_from',
            'checkin_time_until',
            'checkout_time_from',
            'checkout_time_until',
            'reception_time_from',
            'reception_time_until',
        );


        $hotels_id = DB::table('hotels')->insertGetId($data);
        if ($request->hasFile('image')) {
            $images = [];
            foreach ($request->file('image') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('image/hotels'), $filename);
                $images[] = $filename;
                DB::table('hotel_image')->insert([
                    'hotels_id' => $hotels_id,
                    'image' => $filename
                ]);
            }
        }


        $timings['hotel_id'] = $hotels_id;
        DB::table('hotel_timings')->insert($timings);
        foreach ($request->facilities as $facilities) {
            DB::table('hotels_facilities')->insert([
                'hotels_id' => $hotels_id,
                'facilities_id' => $facilities
            ]);
        }
        if (count($request->policy_id)) {
            foreach ($request->policy_id as $policy) {
                DB::table('hotel_policies')->insert([
                    'hotel_id' => $hotels_id,
                    'policy_id' => $policy
                ]);
            }
        }




        return redirect()->route('hotels.roomlist.list')->with('success', 'Create Hotels Success');
    }

    public function edit($id)
    {
        $hotels = DB::table('hotels')->where('id', $id)->first();
        $facilities = DB::table('facilities')->get();
        $locations = DB::table('locations')->get();
        $services = DB::table('services')->get();
        $hotels_facilities = DB::table('hotels_facilities')
            ->where('hotels_id', $id)->get();
        $placetypes = DB::table('place_types')->get();
        $policies = DB::table('policies')->get();
        $hotel_timings = DB::table('hotel_timings')->where('hotel_id', $id)->first();
        $hotel_policies = DB::table('hotel_policies')->where('hotel_id', $id)->get();



        return view('modules.client.hotels-dashboard.edit', compact(
            'hotels',
            'hotels_facilities',
            'locations',
            'services',
            'facilities',
            'placetypes',
            'policies',
            'hotel_timings',
            'hotel_policies'
        ));
    }

    public function update(Request $request, $id)
    {
        DB::table('hotels')->updateOrInsert(['id' => $id], [
            'name' => $request->input('name'),
            'main_image' => $request->input('main_image'),
            'address' => $request->input('address'),
            'location_id' => $request->input('location_id'),
            'place_type_id' => $request->input('place_type_id'),
            'content' => $request->input('content'),
            'hotline' => $request->input('hotline'),
            'updated_at' => new \DateTime
        ]);

        $timings = $request->only(
            'checkin_time_from',
            'checkin_time_until',
            'checkout_time_from',
            'checkout_time_until',
            'reception_time_from',
            'reception_time_until',
        );
        DB::table('hotel_timings')->updateOrInsert(['hotel_id' => $id], $timings);

        if ($request->hasFile('image')) {
            $images = [];
            DB::table('hotel_image')->where('hotels_id', $id)->delete();
            foreach ($request->file('image') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('image/hotels'), $filename);
                $images[] = $filename;
                DB::table('hotel_image')->insert([
                    'hotels_id' => $id,
                    'image' => $filename
                ]);
            }
        }

        DB::table('hotel_policies')->where('hotel_id', $id)->delete();
        if (count($request->policy_id)) {
            foreach ($request->policy_id as $policy) {
                DB::table('hotel_policies')->insert([
                    'hotel_id' => $id,
                    'policy_id' => $policy
                ]);
            }
        }

        DB::table('hotels_facilities')->where('hotels_id', $id)->delete();
        if ($request->facilities) {
            foreach ($request->facilities as $facilities) {
                DB::table('hotels_facilities')->insert([
                    'hotels_id' => $id,
                    'facilities_id' => $facilities
                ]);
            }
        }

        return redirect()->route('hotels.index')->with('success', 'Hotels updated successfully');
    }

    public function remove($id)
    {
        DB::table('hotels_facilities')->where('hotels_id', $id)->delete();
        DB::table('rooms')->where('hotels_id', $id)->delete();
        DB::table('hotels')->where('id', $id)->delete();
        return redirect()->route('hotels.index')->with('success', 'Hotels remove successfully');
    }
    public function showRooms($id)
    {
        return view('modules.client.hotels.rooms.rooms');
    }
}
