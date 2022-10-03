<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TreatmentDirections extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'treatment_directions';
    protected $fillable = ['slug', 'name', 'description', 'meta_title', 'meta_desc', 'keywords', 'meta_H1', 'image','status'];
}
