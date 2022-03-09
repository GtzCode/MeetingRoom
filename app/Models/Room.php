<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\reservation;

class Room extends Model
{
    use HasFactory;

    /**
     * Get all of the reservation for the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function reservation()
    {
        return $this->hasMany(reservation::class,'ROOM_ID','id');
    }
}
