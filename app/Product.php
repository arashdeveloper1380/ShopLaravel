<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
        'id','category_id','brand_id','special',
        'title_fa','title_en','desc_fa',
        'desc_en','price','image','status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function presentPrice($price)
    {
      return number_format($price);
    }

    public function feature()
    {
        return $this->hasMany(Feature::class);
    }
}
