<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authentication_log;
use App\Http\Controllers\Controller;

class AuthenticationLogController extends Controller
{
    public function index()
    {
        $authentication_logs = Authentication_log::with('user')->get();
        return view('admin.log', compact('authentication_logs'));
    }
}
