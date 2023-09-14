<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingsController extends Controller
{
    public function index()
    {

        $bookings = DB::table('bookings')
            ->join('hotels', 'hotels.id', '=', 'bookings.hotels_id')
            ->join('rooms', 'rooms.id', '=', 'bookings.room_id')
            ->select(
                'bookings.*',
                'hotels.name as hotels_name',
                'rooms.name as rooms_name'

            )->orderBy('created_at', 'DESC')
            ->get();

        return view('modules.admin.bookings.index', ['bookings' => $bookings]);
    }
    public function create()
    {
        $hotels = DB::table('hotels')
            ->join('rooms', 'hotels.id', '=', 'rooms.hotels_id')
            ->select(
                'hotels.id as hotelsid',
                'hotels.name as hotelsname',
                'rooms.id as roomid',
                'rooms.name as roomname',
                'rooms.hotels_id as hotelsroom'
            )
            ->get();
        $rooms = DB::table('rooms')->where('hotels_id')->get();
        return view('modules.admin.bookings.create', ['hotels' => $hotels]);
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['booked_on'] = new \DateTime;
        $data['booking_code'] =  rand(4, 50000); //random booking code

        DB::table('bookings')->insert($data);
        return redirect()->route('admin.bookings.index')->with('success', 'Reservation successfully');
    }
    public function update($id)
    {
    }
    public function block($id)
    {
    }
}
