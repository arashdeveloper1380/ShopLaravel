<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = "coupons";

    protected $fillable = [
        'id','code','type',
        'value','percentOff','status'
    ];

    //--------- Exists Coupon Code
    public function findByCode($code)
    {
        return self::where('code',$code)->first();
    }

    //--------- Discount Coupon Code
    public function discount($total)
    {
        if($this->type == 'fix'){
            return $this->value;
        }
        elseif($this->type == 'percentOff'){
            return (integer)$total*($this->percentOff)*10;
        }else{
            return 0;
        }
    }
}
