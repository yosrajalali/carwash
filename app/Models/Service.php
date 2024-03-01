<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function reservations()
    {
        $this->hasMany(Reservation::class);
    }

    public function station()
    {
        $this->belongsTo(Station::class);
    }
}
