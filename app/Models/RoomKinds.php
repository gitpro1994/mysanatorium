<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomKinds extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'room_kinds';
    protected $fillable = ['name', 'description', 'status'];

    public function getDiscount()
    {
        return $this->hasOne(Discounts::class, 'room_kind_id');
    }

    public function getRoomKindOptions()
    {
        return $this->hasOne(SrkOptions::class, 'room_kinds_id');
    }

    public function getRoomKind()
    {
        return $this->hasMany(Srk::class, 'room_kinds_id');
    }

    public function getWizartGroups()
    {
        return $this->hasMany(WizartGroups::class, 'room_kinds_id');
    }

    public function getRoomStatus()
    {
        return $this->hasMany(RoomStatus::class, 'room_kinds_id');
    }
}
