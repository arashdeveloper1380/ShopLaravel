<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    protected $fillable = [
        'id','shipping_id',
        'payment_id','product_ids'
    ];
}
