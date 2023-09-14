<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ProfileController extends Controller
{
    public function showProfile()
    {
        $user_id = Auth::user()->id;
        $members = DB::table('users')->join('user_info', 'users.id', '=', 'user_info.user_id')
            ->select('user_info.name', 'user_info.user_id', 'user_info.image', 'users.level', 'users.status', 'users.email', 'user_info.phone', 'user_info.address')
            ->where('users.id', $user_id)->first();
        $locations = DB::table('locations')->get();
        return view('modules.client.user-dashboard.profile.index', ['members' => $members, 'locations' => $locations]);
    }
    public function editProfile()
    {
        $user_id = Auth::user()->id;
        $members = DB::table('users')->join('user_info', 'users.id', '=', 'user_info.user_id')
            ->select('user_info.name', 'user_info.user_id', 'user_info.image', 'users.level', 'users.status', 'users.email', 'user_info.phone', 'user_info.address')
            ->where('users.id', $user_id)->first();
        $locations = DB::table('locations')->get();

        return view('modules.client.user-dashboard.profile.edit', ['members' => $members, 'locations' => $locations]);
    }
    public function updateProfile(Request $request)
    {

        $user_id = Auth::user()->id;
        DB::table('users')
            ->where('id', $user_id)
            ->update([
                'level' => $request->input('level'),
                'status' => $request->input('status'),
                'updated_at' => new \DateTime
            ]);
        $user_info = DB::table('user_info')->where('user_id', $user_id)->first();

        if (!empty($request->image)) {
            if (File::exists(public_path('image/members/' . $user_info->image))) {
                File::delete(public_path('image/members/' . $user_info->image));
            }
            $file = $request->image;
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image/members'), $filename);
            $data['image'] = $filename;
        }
        DB::table('user_info')
            ->updateOrInsert(
                ['user_id' => $user_id],
                [
                    'name' => $request->input('name'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address'),
                    'image' => isset($data['image']) ? $data['image'] : $user_info->image,
                    'updated_at' => new \DateTime
                ]
            );
        return redirect()->route('dashboard.profile.index')->with('success', 'Profile update successfully');
    }
}
