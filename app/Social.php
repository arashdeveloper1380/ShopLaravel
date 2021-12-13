<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = "socials";

    protected $fillable = ['id','social_fa','social_en','link','status'];
}
