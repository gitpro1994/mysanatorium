<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discounts extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'discounts';
    protected $fillable = ['discount_name','status'];

    public function getSanatoriums()
    {
        return $this->belongsToMany(Sanatoriums::class,'sds');
    }

    public function getDiscountOptions()
    {
        return $this->hasMany(DiscountOptions::class, 'discounts_id');
    }

}
