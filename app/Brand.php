<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = "brands";

    protected $fillable = [
        'id','brand_fa',
        'brand_en','image',
        'status',
    ];

    public function product()
    {
        return $this->hasMany(Product::class,'brand_id','id');
    }
}
