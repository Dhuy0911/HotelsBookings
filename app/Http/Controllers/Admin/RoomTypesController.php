<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoomTypes\StoreRequest;
use App\Http\Requests\Admin\RoomTypes\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomTypesController extends Controller
{
    public function index()
    {
        $type = DB::table('room_types')->get();
        return view('modules.admin.room-types.index', ['roomTypes' => $type]);
    }
    public function create()
    {
        return view('modules.admin.room-types.create');
    }
    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        DB::table('room_types')->insert($data);
        return redirect()->route('admin.roomTypes.index')->with('success', 'Room Types create successfully');
    }
    public function edit($id)
    {
        $roomTypes = DB::table('room_types')->where('id', $id)->first();
        return view('modules.admin.room-types.edit', ['roomTypes' => $roomTypes]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $roomTypes = $request->except('_token');
        $roomTypes['updated_at'] = new \Datetime;
        DB::table('room_types')->where('id', $id)->update($roomTypes);
        return redirect()->route('admin.roomTypes.index')->with('success', 'Room Types update successfully');
    }
    public function remove($id)
    {
        DB::table('room_types')->where('id', $id)->delete();
        return redirect()->route('admin.roomTypes.index')->with('success', 'Room type removed successfully');
    }
}
