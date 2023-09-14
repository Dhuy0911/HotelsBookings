<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\RequestAccepted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OwnerController extends Controller
{
    public function index()
    {
        $owner = DB::table('reg_owner')
            ->join('user_info', 'reg_owner.user_id', '=', 'user_info.user_id')
            ->join('users', 'reg_owner.user_id', '=', 'users.id')
            ->select('reg_owner.*', 'user_info.name as user_name', 'users.email as user_email')
            ->where('reg_owner.status', '=', 2)->get();
        return view('modules.admin.owner.index', compact('owner'));
    }
    public function acceptRegOwner($userId)
    {

        DB::table('users')->where('id', $userId)->update(['level' => 2]);
        DB::table('reg_owner')->where('user_id', $userId)->update(['status' => 1]);
        $user = DB::table('users')->where('id', $userId)->first();
        Mail::to($user->email)->send(new RequestAccepted($user));
        return redirect()->back();
    }

    public function rejectRegOwner($userId)
    {

        DB::table('reg_owner')->where('user_id', $userId)->update(['status' => 3]);
        return redirect()->back();
    }
    public function history()
    {
        $owner = DB::table('reg_owner')
            ->join('user_info', 'reg_owner.user_id', '=', 'user_info.user_id')
            ->join('users', 'reg_owner.user_id', '=', 'users.id')
            ->select('reg_owner.*', 'user_info.name as user_name', 'users.email as user_email')
            ->orderBy('created_at', 'DESC')->get();

        return view('modules.admin.owner.history', compact('owner'));
    }
}
