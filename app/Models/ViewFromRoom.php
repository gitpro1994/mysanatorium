<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ViewFromRoom extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'view_from_rooms';
    protected $fillable = ['name', 'status'];

}
