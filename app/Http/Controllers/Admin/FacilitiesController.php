<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacilitiesController extends Controller
{
    public function index()
    {
        $data = DB::table('facilities')->get();
        return view('modules.admin.facilities.index', ['facilities' => $data]);
    }
    public function create()
    {

        return view('modules.admin.facilities.create');
    }
    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime;
        DB::table('facilities')->insert($data);
        return redirect()->route('admin.facilities.index')->with('success', 'Facilities created success');
    }
    public function edit($id)
    {
        $data = DB::table('facilities')->where('id', $id)->first();
        return view('modules.admin.facilities.edit', ['facilities' => $data]);
    }
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        DB::table('facilities')->where('id', $id)->update($data);
        return redirect()->route('admin.facilities.index')->with('success', 'Facilities updated successfully');
    }
    public function remove($id)
    {
        DB::table('hotels_facilities')->where('facilities_id', $id)->delete();
        DB::table('facilities')->where('id', $id)->delete();
        return redirect()->route('admin.facilities.index')->with('success', 'Facilities remove successfully');
    }
}
