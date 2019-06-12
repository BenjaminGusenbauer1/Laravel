<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Order;

class Status extends Model
{
    protected $fillable=[
        'status', 'order_id'
    ];

    public function order() : BelongsTo {
        return $this->belongsTo(Order::class);
    }

}
