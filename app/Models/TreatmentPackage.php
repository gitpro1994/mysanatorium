<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TreatmentPackage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'treatment_packages';
    protected $fillable = ['name', 'day', 'times', 'image','status'];
}
