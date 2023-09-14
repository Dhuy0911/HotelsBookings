<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\StoreRequest;
use App\Http\Requests\Admin\Service\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $service = DB::table('services')->get();
        return view('modules.admin.service.index', ['service' => $service]);
    }
    public function create()
    {
        return view('modules.admin.service.create');
    }
    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \Datetime;
        DB::table('services')->insert($data);

        return redirect()->route('admin.service.index')->with('success', 'Service created successfully');
    }
    public function edit($id)
    {
        $service =  DB::table('services')->where('id', $id)->first();
        return view('modules.admin.service.edit', ['service' => $service]);
    }
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \Datetime;
        DB::table('services')->where('id', $id)->update($data);
        return redirect()->route('admin.service.index')->with('success', 'Edit service successfully');
    }
    public function remove($id)
    {
        DB::table('room_services')->where('service_id', $id)->delete();
        DB::table('services')->where('id', $id)->delete();
        return redirect()->route('admin.service.index')->with('success', 'Delete service successfully');
    }
}
