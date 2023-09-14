<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class LocationsController extends Controller
{
    public function index()
    {
        $data = DB::table('locations')->get();
        return view('modules.admin.locations.index', ['locations' => $data]);
    }
    public function create()
    {

        return view('modules.admin.locations.create');
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image/locations'), $filename);
            $data['image'] = $filename;
        }
        DB::table('locations')->insert($data);
        return redirect()->route('admin.location.index')->with('success', 'Create location successfully');
    }
    public function edit($id)
    {

        $locations = DB::table('locations')->where('id', $id)->first();
        return view('modules.admin.locations.edit', ['locations' => $locations]);
    }

    public function update(Request $request, $id)
    {

        $data = $request->except('_token');
        $locations = DB::table('locations')->where('id', $id)->first();
        if (!empty($request->image)) {
            if (File::exists(public_path('image/locations/' . $locations->image))) {
                File::delete(public_path('image/locations/' . $locations->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image/locations'), $filename);
            $data['image'] = $filename;
        }
        DB::table('locations')->where('id', $id)->update($data);
        return redirect()->route('admin.location.index')->with('success', 'Locations updated successfully');
    }
    public function remove($id)
    {
        DB::table('hotels')->where('location_id', $id)->delete();
        DB::table('locations')->where('id', $id)->delete();

        return redirect()->route('admin.location.index')->with('success', 'Locations remove successfully');
    }
}
