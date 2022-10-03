<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalBase extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'medical_bases';
    protected $fillable = ['name', 'image', 'description', 'status'];

    public function getMedicalBaseElements()
    {
        return $this->hasMany(MedicalBaseElements::class, 'medical_bases_id');
    }
}
