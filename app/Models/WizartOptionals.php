<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WizartOptionals extends Model
{
    use HasFactory;
    protected $table = 'wizart_optionals';
    protected $guarded = [];

    public function getSanatorium()
    {
        return $this->belongsTo(Sanatoriums::class, 'sanatoriums_id');
    }
}
