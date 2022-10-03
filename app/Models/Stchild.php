<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stchild extends Model
{
    use HasFactory;
    protected $table = 'stchildren';
    protected $guarded = [];

    public function getSanatorium()
    {
        return $this->belongsTo(Sanatoriums::class, 'sanatoriums_id');
    }
}
