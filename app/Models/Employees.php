<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'nama',
        'email',
        'no_telepon',
        'jabatan',
        'departemen',
        'status',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
