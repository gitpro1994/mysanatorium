<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SanatoriumFeatures extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sanatorium_features';
    protected $fillable = ['name', 'image', 'status'];

    public function getSanatoriumFeaturesElements()
    {
        return $this->hasMany(SanatoriumFeaturesElements::class, 'sanatorium_features_id');
    }
}
