<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Sanatoriums extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sanatoriums';
    protected $guarded = [];

    public function getCountry()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }

    public function getCity()
    {
        return $this->belongsTo(Cities::class, 'city_id');
    }

    public function getCompany()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function getCurrency()
    {
        return $this->belongsTo(Currencies::class, 'currency_id');
    }

    public function getDiscount()
    {
        return $this->hasMany(Sanatoriums::class, 'sanatorium_id');
    }

    public function getPenalty()
    {
        return $this->hasOne(Penalties::class, 'sanatoriums_id');
    }

    public function getMedicalBaseElements()
    {
        return $this->belongsToMany(MedicalBaseElements::class, 'smb_elements');
    }

    public function getDiscountOptions()
    {
        return $this->hasMany(DiscountOptions::class, 'sanatoriums_id');
    }

    public function getSrks()
    {
        return $this->hasMany(Srk::class, 'sanatoriums_id');
    }

    public function getSccs()
    {
        return $this->hasMany(Sccs::class, 'sanatoriums_id');
    }

    public function getSws()
    {
        return $this->hasMany(Sws::class, 'sanatoriums_id');
    }

    public function getWizartOptional()
    {
        return $this->hasMany(WizartOptionals::class, 'sanatoriums_id');
    }

    public function getStchild()
    {
        return $this->hasMany(Stchild::class, 'sanatoriums_id');
    }

    public function getStoutchild()
    {
        return $this->hasMany(Stoutchild::class, 'sanatoriums_id');
    }

    public function getComments()
    {
        return $this->hasMany(Comments::class, 'sanatoriums_id');
    }
}
