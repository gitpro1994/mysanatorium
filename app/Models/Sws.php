<?php

namespace App\Models;

use Egulias\EmailValidator\Exception\UnclosedComment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sws extends Model
{
    use HasFactory;

    protected $table = 'sws';
    protected $guarded = [];

    public function getSanatorium()
    {
        return $this->belongsTo(Sanatoriums::class, 'sanatoriums_id');
    }


}
