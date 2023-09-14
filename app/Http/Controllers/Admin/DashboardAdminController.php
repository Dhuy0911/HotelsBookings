<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $members = DB::table('users')->orderBy('created_at', 'DESC')->get();
        $hotels = DB::table('hotels')->get();
        $bookings = DB::table('bookings')->get();
        $news = DB::table('news')->get();
        $locations = DB::table('locations')->get();
        

        return view('modules.admin.dashboard', [
            'members' => $members,
            'hotels' => $hotels,
            'bookings' => $bookings,
            'news' => $news,
            'locations' => $locations
        ]);
    }
}
