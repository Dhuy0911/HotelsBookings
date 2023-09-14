<?php

namespace App\Http\Controllers;

use App\Mail\RequestAccepted;
use App\Mail\SendNoti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function send()
    {

        $data = [];
        Mail::to('admin@abc.com')->send(new SendNoti($data));
    }
    public function bookingSuccess()
    {
        
    
        
        return view('modules.mail.booking-success');
    }
    public function requestAccepted()
    {

        $data = [
            'name' => ' Nguyễn Văn A',
            'email' => 'admin@abc.com',
            'phone' => '0123456789',
            
        ];
        Mail::to('admin@abc.com')->send(new RequestAccepted($data));
        return view('mail.request-accepted');
    }
}
