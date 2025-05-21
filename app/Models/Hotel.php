<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_hotel',
        'alamat',
        'kontak'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function panicButtons()
    {
        return $this->hasMany(PanicButton::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
