<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function search(Request $request)
    {
        $data = $request->all();
        return response()->json($data);
    }
}
