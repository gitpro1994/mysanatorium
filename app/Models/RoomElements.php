<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomElements extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'room_elements';
    protected $fillable = ['room_condition_id', 'name', 'description', 'show_filter', 'status'];

    public function getRoomCondition()
    {
        return $this->belongsTo(RoomConditions::class, 'room_condition_id');
    }
}
