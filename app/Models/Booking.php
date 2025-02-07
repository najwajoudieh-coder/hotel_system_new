<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'room_id',
        'name',
        'email',
        'phone',
        'start_date',
        'end_date',
        ];

    public function room(){
        // The room_id column in the Booking table is used to reference the id column in the Room table.
        // we established a connection between the Booking and Room tables.

            return $this->belongsTo('App\Models\Room', 'room_id', 'id');
        
    }
}
