<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Hotels\StoreRequest;
use App\Http\Requests\Admin\Hotels\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HotelsController extends Controller
{
    public function index()
    {
        $hotels = DB::table('hotels')
            ->join('users', 'hotels.user_id', '=', 'users.id')
            ->join('user_info', 'users.id', '=', 'user_info.user_id')
            ->join('locations', 'locations.id', '=', 'hotels.location_id')
            ->select('hotels.*', 'user_info.name as user_name', 'locations.name as location_name')
            ->orderBy('created_at', 'DESC')
            ->get();
        $user_id = Auth::id();
        $hotelsowner = DB::table('hotels')
            ->join('users', 'hotels.user_id', '=', 'users.id')
            ->join('user_info', 'users.id', '=', 'user_info.user_id')
            ->select('hotels.*', 'user_info.name as user_name')
            ->where('users.id', $user_id) // Lọc ra chỉ các khách sạn của user đang đăng nhập
            ->orderBy('created_at', 'DESC')
            ->first();




        return view('modules.admin.hotels.index', [
            'hotels' => $hotels,
            'hotels_owner' => $hotelsowner,

        ]);
    }
    public function create()
    {
        $users = DB::table('user_info')->join('users', 'user_info.user_id', '=', 'users.id')
            ->select('user_info.name', 'users.level', 'users.id as id_users')->get();
        $facilities = DB::table('facilities')->get();
        $locations = DB::table('locations')->get();

        return view('modules.admin.hotels.create', [
            'users' => $users,
            'facilities' => $facilities,
            'locations' => $locations
        ]);
    }
    public function store(StoreRequest $request)
    {
        $user_id = Auth::id();
        $data = $request->except('_token', 'facilities');
        $data['created_at'] = new \DateTime; // cập nhật thời gian tạo mới nhất 
        $data['user_id'] = $user_id;
        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image/hotels/'), $filename);
            $data['main_image'] = $filename;
        }
        $hotels_id = DB::table('hotels')->insertGetId($data);

        foreach ($request->facilities as $facilities) {
            DB::table('hotels_facilities')->insert([
                'hotels_id' => $hotels_id,
                'facilities_id' => $facilities
            ]);
        }

        return redirect()->route('admin.hotels.index')->with('success', 'Create Hotels Success');
    }
    public function edit($id)
    {
        $hotels = DB::table('hotels')
            ->join('users', 'hotels.user_id', '=', 'users.id')
            ->join('locations', 'locations.id', '=', 'hotels.location_id')
            ->join('user_info', 'users.id', '=', 'user_info.user_id')
            ->select(
                'hotels.*',
                'user_info.name as user_name',
                'locations.name as location_name'
            )
            ->where('hotels.id', $id)
            ->first();
        $locations = DB::table('locations')->get();
        $facilities = DB::table('facilities')->get();
        $hotels_facilities = DB::table('hotels_facilities')
            ->where('hotels_id', $id)
            ->pluck('facilities_id')
            ->toArray();
        return view('modules.admin.hotels.edit', [
            'hotels' => $hotels,
            'facilities' => $facilities,
            'hotels_facilities' => $hotels_facilities,
            'locations' => $locations
        ]);
    }
    public function update(UpdateRequest $request, $id)
    {
        DB::table('hotels')->updateOrInsert(['hotels.id' => $id], [
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'main_image' => $request->input('main_image'),
            'location_id' => $request->input('location_id'),
            'content' => $request->input('content'),
            'time_open' => $request->input('time_open'),
            'time_closed' => $request->input('time_closed'),
            'hotline' => $request->input('hotline'),
            'status' => $request->input('status'),
            'updated_at' => new \DateTime
        ]);

        // $data = $request->except('_token', 'facilities');
        // $data['updated_at'] = new \DateTime; // cập nhật thời gian tạo mới nhất 

        // DB::table('hotels')->where('id', $id)->update($data);
        $hotels_id = DB::table('hotels')->where('id', $id)->select('hotels.id')->value('id');

        DB::table('hotels_facilities')->where('hotels_id', $id)->delete();
        foreach ($request->facilities as $facilities) {
            DB::table('hotels_facilities')->insert([
                'hotels_id' => $hotels_id,
                'facilities_id' => $facilities
            ]);
        }



        return redirect()->route('admin.hotels.info', ['id' => $id])->with('success', 'Update Hotels Successfully');
    }

    public function info($id)
    {
        $hotels = DB::table('hotels')
            ->join('users', 'hotels.user_id', '=', 'users.id')
            ->join('user_info', 'users.id', '=', 'user_info.user_id')
            ->join('locations', 'locations.id', '=', 'hotels.location_id')
            ->select(
                'hotels.*',
                'user_info.name as user_name',
                'locations.name as location_name'
            )
            ->where('hotels.id', $id)
            ->first();
        $hotels_facilities = DB::table('hotels_facilities')
            ->join('facilities', 'facilities.id', '=', 'hotels_facilities.facilities_id')
            ->join('hotels', 'hotels.id', '=', 'hotels_facilities.hotels_id')
            ->select(
                'facilities.name',
                'facilities.description',

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


                DB::raw("GROUP_CONCAT(services.name SEPARATOR ', ') as service_name")
            )
            ->where('hotels.id', $id)
            ->groupBy('rooms.id', 'hotels.id', 'rooms.name', 'rooms.price', 'rooms.status', 'rooms.persons')
            ->get();

        $room_services = [];

        foreach ($rooms as $room) {
            $room_services[$room->id][] = $room->service_name;
        }

        foreach ($room_services as $room_id => $services) {
            $room_services[$room_id] = implode(', ', $services);
        }
        return view('modules.admin.hotels.info', [
            'hotels' => $hotels,
            'room_services' => $room_services,
            'rooms' => $rooms,
            'hotels_facilities' => $hotels_facilities
        ]);
    }
    public function remove($id)
    {
        DB::table('hotels_facilities')->where('hotels_id', $id)->delete();
        DB::table('rooms')->where('hotels_id', $id)->delete();
        DB::table('hotels')->where('id', $id)->delete();
        return redirect()->route('admin.hotels.index')->with('success', 'Hotels remove successfully');
    }
}
