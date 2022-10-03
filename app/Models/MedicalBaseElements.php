<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalBaseElements extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'medical_base_elements';
    protected $fillable = ['mb_id', 'name', 'description', 'image', 'status'];

    public function getMedicalBase()
    {
        return $this->belongsTo(MedicalBase::class, 'medical_bases_id');
    }

    public function getSanatoriums()
    {
        return $this->belongsToMany(Sanatoriums::class, 'smb_elements');
    }

}
