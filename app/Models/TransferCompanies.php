<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransferCompanies extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transfer_companies';
    protected $fillable = ['country_id', 'city_id', 'name','related_person', 'address', 'postal_code', 'representative', 'tax_number', 'voen', 'contact_number', 'email', 'reservation_email', 'currency_id', 'status'];

    public function getCountry()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }

    public function getCity()
    {
        return $this->belongsTo(Cities::class, 'city_id');
    }

    public function getCurrency()
    {
        return $this->belongsTo(Currencies::class,'currency_id');
    }

    public function getRouteLines()
    {
        return $this->hasMany(RouteLines::class, 'transfer_company_id');
    }
}
