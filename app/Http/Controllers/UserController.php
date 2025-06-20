<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loadDashboard(){
        $logged_user = Auth::user();
        return view('user.user-dashboard',compact('logged_user'));
    }

    public function loadRooms(){
        $logged_user = Auth::user();
        return view('user.user-rooms',compact('logged_user'));
    }

    public function loadReservationPage(){
        $logged_user = Auth::user();
        return view('user.user-reservations',compact('logged_user'));
    }

    public function loadProfile(){
        $logged_user = Auth::user();
        return view('user.user-profile',compact('logged_user'));
    }

    public function loadNotifications(){
        $logged_user = Auth::user();
        return view('user.user-notifications',compact('logged_user'));
    }

    public function loadHelp(){
        $logged_user = Auth::user();
        return view('user.user-help-page',compact('logged_user'));
    }

    public function loadReservationForm(){
        $logged_user = Auth::user();
        return view('user.reservation-page',compact('logged_user'));
    }

    public function loadPaymentForm(){
        $logged_user = Auth::user();
        return view('user.user-form-payment',compact('logged_user'));
    }

    public function loadDetailReservation(){
        $logged_user = Auth::user();
        return view('user.user-detail-reservation',compact('logged_user'));
    }
}
