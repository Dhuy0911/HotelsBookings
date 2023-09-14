<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\BookingSuccess;
use App\Mail\SendNotiOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{

    public function bookings($hotelId, $roomId)
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
            ->where('hotels.id', $hotelId)
            ->first();
        $locations = DB::table('locations')->get();
        $rooms = DB::table('rooms')->where('id', $roomId)->first();

        return view('modules.client.bookings.index', compact('hotels', 'rooms', 'locations'));
    }
    public function create(Request $request)
    {

        $data = $request->except('_token', 'booking-for');
        $data['check_in_date'] = date("Y-m-d", strtotime(json_decode($request->check_in_date)));
        $data['check_out_date'] = date("Y-m-d", strtotime(json_decode($request->check_out_date)));
        $data['booking_code'] = rand(6, 1000000);
        $data['booked_on'] = new \DateTime;
        $data['user_id'] = Auth::user()->id;
        $price = $data['total_price'];
        // Tính commission
        $data['commission'] = $price * 0.15;

        // Tính giá tiền mà chủ khách sạn nhận được
        $data['earning'] = $price - $data['commission'];
        $hotelsName = DB::table('hotels')->where('id', $data['hotels_id'])->first();
        $roomName = DB::table('rooms')->where('id', $data['room_id'])->first();
        $owner = DB::table('users')
            ->join('hotels', 'users.id', '=', 'hotels.user_id')
            ->select('users.*')
            ->where('hotels.id', $data['hotels_id'])->first();

        Mail::to($owner->email)->send(new SendNotiOwner($owner));
        Mail::to($data['email'])->send(new BookingSuccess($data, $roomName, $hotelsName));


        DB::table('bookings')->insert($data);

        return redirect()->back()->with('success', 'Bookings Successfully');
    }
}
