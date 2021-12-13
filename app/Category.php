<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";

    protected $fillable = [
        'id','category_fa','category_en','slug','image','status'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
