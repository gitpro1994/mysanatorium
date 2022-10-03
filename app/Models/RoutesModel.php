<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoutesModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'routes_models';
    protected $fillable = ['country_id' ,'address', 'status'];

    public function getCountry()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }
}
