<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmbElements extends Model
{
    use HasFactory;

    protected $table = 'smb_elements';
    protected $fillable = ['sanatoriums_id', 'medical_base_elements_id'];
}
