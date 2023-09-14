<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliciesController extends Controller
{
    public function index()
    {
        $policies = DB::table('policies')->orderBy('created_at', 'DESC')->get();
        return view('modules.admin.policies.index', compact('policies'));
    }
}
