<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cities extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cities';
    protected $fillable = ['country_id','slug', 'title', 'search_title', 'status'];

    public function getCountry()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }

    public function getCompanies()
    {
        return $this->hasMany(Company::class, 'city_id');
    }

    public function getTransferCompanies()
    {
        return $this->hasMany(TransferCompanies::class, 'city_id');
    }

    public function getSanatoriums()
    {
        return $this->hasMany(Sanatoriums::class, 'city_id');
    }
}
