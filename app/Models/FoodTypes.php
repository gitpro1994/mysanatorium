<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodTypes extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'food_types';
    protected $fillable = ['name', 'status'];
}
