<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loadHomePage(){
        $logged_user = Auth::user();
        return view('user.homepage',compact('logged_user'));
    }

    public function loadReservationPage(){
        $logged_user = Auth::user();
        return view('user.reservation-page',compact('logged_user'));
    }
}
