<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalties extends Model
{
    use HasFactory;
    protected $table = 'penalties';
    protected $fillable = [
        'sanatoriums_id',
        'before_0_2_days',
        'before_3_7_days',
        'before_8_14_days',
        'before_15_21_days',
        'before_22_28_days',
        'before_29_days',
        ];

    public function getSanatorium()
    {
        return $this->belongsTo(Sanatoriums::class,'sanatoriums_id');
    }
}
