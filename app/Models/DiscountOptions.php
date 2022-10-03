<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountOptions extends Model
{
    use HasFactory;

    protected $table = 'discount_options';
    protected $fillable = [
        'sanatoriums_id',
        'discounts_id',
        'room_kinds_id',
        'all_rooms',
        'start_date',
        'finish_date',
        'discount',
        'min_night',
        'max_night',
        'depending_number_of_person',
        'number_of_person',
        'free_night',
        'before_reserv_day_start',
        'before_reserv_day_end',


    ];

    public function getDiscount()
    {
        return $this->belongsTo(Discounts::class, 'discounts_id');
    }

    public function getSanatorium()
    {
        return $this->belongsTo(Sanatoriums::class, 'sanatoriums_id');
    }
}
