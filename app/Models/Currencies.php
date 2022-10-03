<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currencies extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'currencies';
    protected $fillable = ['slug', 'code', 'title', 'currency', 'symbol', 'status'];

    public function getTransferCompanies()
    {
        return $this->hasMany(TransferCompanies::class, 'currency_id');
    }

    public function getSanatoriums()
    {
        return $this->hasMany(Currencies::class, 'currency_id');
    }
}
