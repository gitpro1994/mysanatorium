<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Srk extends Model
{
    use HasFactory;

    protected $table = 'srks';
    protected $fillable = [
        'sanatoriums_id',
        'room_kinds_id',
        'room_size',
        'bed_width',
        'smoking',
        'main_image',
        'room_features',
        'room_amenities',
        'status'
    ];

    public function getSanatorium()
    {
        return $this->belongsTo(Sanatoriums::class, 'sanatoriums_id');
    }

    public function getRoomKind()
    {
        return $this->belongsTo(RoomKinds::class, 'room_kinds_id');
    }
}
