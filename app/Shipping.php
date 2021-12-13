<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = "shippings";

    protected $fillable = [
        'id','name','email','city','description',
        'lname','phone','codePost','address'
    ];
}
