<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomStatus extends Model
{
    use HasFactory;
    protected $table = 'room_status';
    protected $guarded = [];


    public function getSanatorium()
    {
        return $this->belongsTo(Sanatoriums::class, 'sanatorium_id');
    }

    public function getRoom()
    {
        return $this->belongsTo(RoomKinds::class, 'room_kinds_id');
    }
}
