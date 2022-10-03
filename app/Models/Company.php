<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'companies';
    protected $fillable = ['name', 'country_id', 'city_id', 'related_person', 'address', 'postal_code', 'representative', 'tax_number', 'voen', 'contact_number', 'email', 'status'];

    public function getCity()
    {
        return $this->belongsTo(Cities::class, 'city_id');
    }

    public function getCountry()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }

    public function getSanatoriums()
    {
        return $this->hasMany(Sanatoriums::class, 'company_id');
    }
}
