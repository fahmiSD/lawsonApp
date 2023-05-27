<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchant_name',
        'city_id',
        'address',
        'phone',
        'expired_date',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
