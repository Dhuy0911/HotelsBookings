<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomServiceController extends Controller
{
    public function index()
    {
        $roomService = DB::table('room_services')
            ->join('services', 'services.id', '=', 'room_services.service_id')
            ->join('room_types', 'room_types.id', '=', 'room_services.room_type_id')
            ->select(
                'room_services.*',
                'services.name as serviceName',
                'room_types.name as typeName',
                'room_types.id as typeId'
            )
            ->get();
        return view('modules.admin.room-service.index', ['roomService' => $roomService]);
    }
    public function create()
    {
        $services = DB::table('services')->get();
        $room_types = DB::table('room_types')->get();
        return view('modules.admin.room-service.create', ['services' => $services, 'room_types' => $room_types]);
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $room_type_id = $data['room_type_id'];
        $service_ids = $data['service_id'];

        foreach ($service_ids as $service_id) {
            DB::table('room_services')->insert([
                'room_type_id' => $room_type_id,
                'service_id' => $service_id,
            ]);
        }

        return redirect()->route('admin.roomService.index')->with('success', 'Create Room Service successfully');
    }
    public function edit($id)
    {
        // $services = DB::table('services')->get();
        // $room_types = DB::table('room_types')->get();
        // return view('modules.admin.room-service.create', ['services' => $services, 'room_types' => $room_types]);
    }
}
