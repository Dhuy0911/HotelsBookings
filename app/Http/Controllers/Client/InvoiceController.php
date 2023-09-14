<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index($id)
    {
        $locations = DB::table('locations')->get();
        $userId = Auth::user()->id;
        $bookings = DB::table('bookings')
        ->join('hotels', 'bookings.hotels_id', '=', 'hotels.id')
        ->join('rooms', 'bookings.room_id', '=', 'rooms.id')
        ->select('bookings.*', 'hotels.name as hotel_name', 'rooms.name as room_name')
        ->where('bookings.id', $id)->where('bookings.user_id', $userId)->first();
       
        return view('modules.client.invoice.index', compact('bookings', 'locations'));
    }
}
