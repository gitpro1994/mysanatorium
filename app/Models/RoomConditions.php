<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomConditions extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'room_conditions';
    protected $fillable = ['name', 'description', 'status'];

    public function getRoomElements()
    {
        return $this->hasMany(RoomElements::class, 'room_condition_id');
    }
}
