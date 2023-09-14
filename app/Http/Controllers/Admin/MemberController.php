<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Member\StoreRequest;
use App\Http\Requests\Admin\Member\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MemberController extends Controller
{
    public function index()
    {
        $members = DB::table('users')
            ->join('user_info', 'users.id', '=', 'user_info.user_id')
            ->select('user_info.name', 'user_info.image', 'user_info.user_id', 'users.level', 'users.status', 'users.email', 'user_info.phone', 'user_info.address')
            ->get();

        return view('modules.admin.member.index', ['members' => $members]);
    }
    public function info($id)
    {
        $members = DB::table('users')->join('user_info', 'users.id', '=', 'user_info.user_id')
            ->select('user_info.name', 'user_info.user_id', 'user_info.image', 'users.level', 'users.status', 'users.email', 'user_info.phone', 'user_info.address')
            ->where('users.id', $id)->first();

        return view('modules.admin.member.info', ['members' => $members]);
    }
    public function create()
    {

        return view('modules.admin.member.create');
    }
    public function store(StoreRequest $request)
    {
        DB::table('users')->insert([
            'email' => $request->input('email'),
            'level' => $request->input('level'),
            'password' => bcrypt($request->input('password')),
        ]);

        $user_id = DB::table('users')->where('email', $request->input('email'))->value('id');
        $dataInfo = [
            'user_id' => $user_id,
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image/members'), $filename);
            $dataInfo['image'] = $filename;
        }

        DB::table('user_info')->insert($dataInfo);


        return redirect()->route('admin.member.index')->with('success', 'User created successfully');
    }
    public function edit($id)
    {
        $members = DB::table('users')->join('user_info', 'users.id', '=', 'user_info.user_id')
            ->select('user_info.name', 'user_info.image', 'user_info.user_id', 'users.level', 'users.status', 'users.email', 'user_info.phone', 'user_info.address')
            ->where('users.id', $id)->first();

        return view('modules.admin.member.edit', ['members' => $members]);
    }
    public function update(UpdateRequest $request, $id)
    {

        DB::table('users')
            ->where('id', $id)
            ->update([
                'level' => $request->input('level'),
                'status' => $request->input('status'),
                'updated_at' => new \DateTime
            ]);


        // Cập nhật thông tin trong bảng user_info
        $user_info = DB::table('user_info')->where('user_id', $id)->first();

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
                ['user_id' => $id],
                [
                    'name' => $request->input('name'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address'),
                    'image' => isset($data['image']) ? $data['image'] : $user_info->image,
                    'updated_at' => new \DateTime
                ]
            );


        if (Auth::user()->level == 3) {
            return redirect()->route('admin.member.index')->with('success', 'User updated successfully');
        }
        return redirect()->route('admin.member.info', ['id' => $id])->with('success', 'User updated successfully');
    }
    public function block($id)
    {
    }
}
