<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = "features";

    protected $fillable = [
        'id','product_id','name',
        'value','status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
