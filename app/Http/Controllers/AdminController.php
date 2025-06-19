<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loadDashboard(){
        $logged_user = Auth::user();
        return view('admin.admin-dashboard',compact('logged_user'));
    }

    public function loadRoom(){
        $logged_user = Auth::user();
        return view('admin.admin-room',compact('logged_user'));
    }

    public function loadReservation(){
        $logged_user = Auth::user();
        return view('admin.admin-reservation',compact('logged_user'));
    }

    public function loadPayment(){
        $logged_user = Auth::user();
        return view('admin.admin-payment',compact('logged_user'));
    }

    public function loadEmployee(){
        $logged_user = Auth::user();
        return view('admin.admin-employee',compact('logged_user'));
    }

    public function loadPanic(){
        $logged_user = Auth::user();
        return view('admin.admin-panic-button',compact('logged_user'));
    }
}
