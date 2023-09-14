<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function all()
    {
        $locations = DB::table('locations')->get();
        $hotels = DB::table('hotels')
            ->join('users', 'hotels.user_id', '=', 'users.id')
            ->join('user_info', 'users.id', '=', 'user_info.user_id')
            ->join('locations', 'locations.id', '=', 'hotels.location_id')
            ->select(
                'hotels.*',
                'user_info.name as user_name',
                'user_info.image as user_image',
                'locations.name as location_name'
            )
            ->get();
        $hotelsId = $hotels->pluck('id');   // lấy ra id của các hotel trong location

        $hotels_facilities = DB::table('hotels_facilities')
            ->join('facilities', 'hotels_facilities.facilities_id', '=', 'facilities.id')
            ->select(
                'facilities.*',
                'hotels_facilities.*'
            )
            ->whereIn('hotels_id', $hotelsId)
            ->get();

        return view('modules.client.locations-sort-hotels.all', compact('locations', 'hotels', 'hotels_facilities'));
    }
    public function result($id)
    {

        $city = DB::table('locations')->where('id', $id)->first();
        $locations = DB::table('locations')->get();

        if ($city) {
            $hotels = DB::table('hotels')
                ->join('users', 'hotels.user_id', '=', 'users.id')
                ->join('user_info', 'users.id', '=', 'user_info.user_id')
                ->join('locations', 'locations.id', '=', 'hotels.location_id')
                ->select(
                    'hotels.*',
                    'user_info.name as user_name',
                    'user_info.image as user_image',
                    'locations.name as location_name'
                )
                ->where('location_id', $city->id)
                ->get();
        } else {
            $hotels = DB::table('hotels')
                ->join('users', 'hotels.user_id', '=', 'users.id')
                ->join('user_info', 'users.id', '=', 'user_info.user_id')
                ->join('locations', 'locations.id', '=', 'hotels.location_id')
                ->select(
                    'hotels.*',
                    'user_info.name as user_name',
                    'user_info.image as user_image',
                    'locations.name as location_name'
                )
                ->get();
        }


        $hotelsId = $hotels->pluck('id');   // lấy ra id của các hotel trong location
        $hotels_facilities = DB::table('hotels_facilities')
            ->join('facilities', 'hotels_facilities.facilities_id', '=', 'facilities.id')
            ->select(
                'facilities.*',
                'hotels_facilities.*'
            )
            ->whereIn('hotels_id', $hotelsId)
            ->get();
        return view('modules.client.locations-sort-hotels.result', [
            'hotels' => $hotels,
            'city' => $city,
            'hotels_facilities' => $hotels_facilities,
            'locations' => $locations
        ]);
    }

    public function getHotelsInCity()
    {


        $hotels = DB::table('hotels')
            ->join('users', 'hotels.user_id', '=', 'users.id')
            ->join('user_info', 'users.id', '=', 'user_info.user_id')
            ->join('locations', 'locations.id', '=', 'hotels.location_id')
            ->select(
                'hotels.*',
                'user_info.name as user_name',
                'user_info.image as user_image',
                'locations.name as location_name'
            )
            ->get();
        return response()->json($hotels);
    }
}
