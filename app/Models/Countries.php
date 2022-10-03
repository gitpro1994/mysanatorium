<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Countries extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'countries';
    protected $fillable = [
        'slug',
        'title',
        'search_title',
        'shortened',
        'meta_titul',
        'meta_description',
        'meta_keywords',
        'meta_H1',
        'country_number_prefix',
        'flag',
        'cover'
    ];

    public function getCities()
    {
        return $this->hasMany(Cities::class, 'country_id');
    }

    public function getCompanies()
    {
        return $this->hasMany(Company::class, 'country_id');
    }

    public function getTransferCompanies()
    {
        return $this->hasMany(TransferCompanies::class, 'country_id');
    }

    public function getRoutes()
    {
        return $this->hasMany(RoutesModel::class, 'country_id');
    }

    public function getSanatoriums()
    {
        return $this->hasMany(Sanatoriums::class, 'country_id');
    }
}
