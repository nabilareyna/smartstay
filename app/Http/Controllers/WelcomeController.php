<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class WelcomeController extends Controller
{
    public function index()
    {
        $rooms = Room::all(); // ambil semua data kamar
        return view('welcome', compact('rooms'));
    }
}
