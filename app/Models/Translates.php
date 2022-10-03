<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translates extends Model
{
    use HasFactory;
    protected $table = 'translates';
    protected $fillable = ['word','english'];
}
