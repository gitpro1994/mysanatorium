<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sccs extends Model
{
    use HasFactory;

    protected $table = 'sccs';
    protected $fillable = ['sanatoriums_id','credit_cards_id', 'start_date', 'finish_date',  'cvv_available', 'status'];

    public function getSanatorium()
    {
        return $this->belongsTo(Sanatoriums::class, 'sanatoriums_id');
    }

}
