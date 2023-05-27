<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItems;
use App\Models\MasterStatus;

class OrderStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'status_id',
    ];

    public function orderStatus()
    {
        return $this->belongsTo(OrderItems::class);
    }

    public function masterStatus()
    {
        return $this->belongsTo(MasterStatus::class);
    }
}
