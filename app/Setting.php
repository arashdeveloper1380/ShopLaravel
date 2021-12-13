<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = "settings";

    protected $fillable = [
        'id','email','mobile',
        'description'
    ];

    public $timestamps = false;
}
