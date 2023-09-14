<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $account =  DB::table('user_info')->get();
        $location = DB::table('locations')->get();
        $city = DB::table('locations')->paginate(6);
        $hotels = DB::table('hotels')
            ->orderBy('created_at', 'DESC')
            ->get();
        $hotelsId = $hotels->pluck('id')->toArray();
        // foreach ($hotelsId as $key => $value) {
        //     $hotels_image = DB::table('hotel_image')->where('hotels_id', $value)->get();
        //     $hotels[$key]->hotels_image = $hotels_image;
        // }
        $hotels_facilities = DB::table('hotels_facilities')
            ->join('facilities', 'hotels_facilities.facilities_id', '=', 'facilities.id')
            ->select(
                'facilities.*',
                'hotels_facilities.*'
            )
            ->whereIn('hotels_id', $hotelsId)
            ->get();
        return view('modules.client.home', [
            'account' => $account,
            'locations' => $location,
            'hotels' => $hotels,
            'hotels_facilities' => $hotels_facilities,
            'city' => $city


        ]);
    }
    public function store(Request $request)
    {
        $email = $request->email;
        $pass = $request->password;
        $user = DB::table('users')->where('email', $email)->first();
        if (!$user || Auth::check(bcrypt($pass), $user->password)) {
            dd($pass, $user->password);
            return back();
        }
        return redirect()->route('home');
    }
}
