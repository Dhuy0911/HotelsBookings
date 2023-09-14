<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rooms\StoreRequest;
use App\Http\Requests\Admin\Rooms\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{
    public function index()
    {
        $rooms = DB::table('rooms')
            ->join('hotels', 'hotels.id', '=', 'rooms.hotels_id')
            ->select(
                'rooms.*',
                'hotels.name as hotelsName'
            )
            ->get();
        return view('modules.admin.rooms.index', ['rooms' => $rooms]);
    }
    public function create($id)
    {
        $services = DB::table('services')->get();
        $hotels = DB::table('hotels')->where('id', $id)->first();

        return view('modules.admin.rooms.create', ['hotels' => $hotels, 'services' => $services]);
    }
    public function store(StoreRequest $request, $id)
    {
        $rooms = $request->except('_token', 'service');
        $rooms['created_at'] = new \Datetime;
        $hotels = DB::table('hotels')->where('id', $id)->first();
        $rooms['hotels_id'] = $hotels->id;
        $room_id = DB::table('rooms')->insertGetId($rooms);


        foreach ($request->service as $service) {
            DB::table('room_services')->insert([
                'rooms_id' => $room_id,
                'service_id' => $service
            ]);
        }
        return redirect()->route('admin.hotels.info', [
            'id' => $hotels->id,
        ])->with('success', 'Create Rooms Success');
    }


    public function edit($id)
    {

        $rooms = DB::table('rooms')
            ->join('hotels', 'hotels.id', '=', 'rooms.hotels_id')
            ->select(
                'rooms.*',
                'hotels.name as hotelsName',
                'hotels.id as hotelsId'
            )
            ->where('rooms.id', $id)->first();
        $services = DB::table('services')->get();
        $room_services = DB::table('room_services')
            ->where('rooms_id', $id)
            ->pluck('service_id')
            ->toArray();

        return view('modules.admin.rooms.edit', [
            'rooms' => $rooms,
            'services' => $services,
            'room_services' => $room_services
        ]);
    }
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token', 'service');
        $data['updated_at'] = new \Datetime;
        $hotels = DB::table('hotels')
            ->join('rooms', 'rooms.hotels_id', '=', 'hotels.id')
            ->select(
                'rooms.hotels_id as hotelsId'
            )
            ->where('rooms.id', $id)
            ->first();


        DB::table('room_services')
            ->where('rooms_id', $id)
            ->delete();

        foreach ($request->service as $service) {
            DB::table('room_services')->insert([
                'rooms_id' => $id,
                'service_id' => $service
            ]);
        }

        DB::table('rooms')->where('id', $id)->update($data);
        return redirect()->route('admin.hotels.info', ['id' => $hotels->hotelsId])->with('success', 'Rooms updated successfully');
    }
    public function remove($id)
    {
        DB::table('room_services')->where('rooms_id', $id)->delete();
        DB::table('rooms')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Room removed successfully');
    }
}
