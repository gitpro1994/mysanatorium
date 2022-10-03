<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreditCards extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'credit_cards';
    protected $fillable = ['name', 'icon', 'status'];

}
