<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room; 

class reservation extends Model
{
    use HasFactory;

/**
 * Get the Room that owns the reservation
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function Room()
{
    return $this->belongsTo(Room::class, 'ROOM_ID', 'id');
}

}
