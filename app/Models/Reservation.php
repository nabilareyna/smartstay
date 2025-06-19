<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Room;
use App\Models\Payment;

class Reservation extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'room_id',
        'checkin',
        'checkout',
        'status'
    ];

    protected $casts = [
        'checkin' => 'datetime',
        'checkout' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
