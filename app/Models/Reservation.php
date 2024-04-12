<?php

namespace App\Models;

use Database\Seeders\ExteriorTimeslotSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_time',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function timeslot()
    {
        return $this->belongsTo(Timeslot::class);
    }

    public function scopeForDate($query, $date)
    {
        return $query->whereDate('reservation_date', $date);
    }

}
