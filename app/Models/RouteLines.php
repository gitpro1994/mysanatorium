<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RouteLines extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'route_lines';
    protected $fillable = ['transfer_company_id','price', 'name_surname', 'note', 'from', 'to', 'travel_time', 'travel_type', 'min', 'max', 'description', 'status'];

    public function getTransferCompany()
    {
        return $this->belongsTo(TransferCompanies::class, 'transfer_company_id');
    }
}
