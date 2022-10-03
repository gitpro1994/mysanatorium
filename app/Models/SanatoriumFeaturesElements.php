<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SanatoriumFeaturesElements extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'sanatorium_features_elements';
    protected $fillable = ['sanatorium_features_id', 'name', 'image', 'status'];

    public function getSanatoriumFeatures()
    {
        return $this->belongsTo(SanatoriumFeatures::class,'sanatorium_features_id');
    }
}
