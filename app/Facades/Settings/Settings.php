<?php

namespace App\Facades\Settings;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;


class Settings
{
    public function price($value)
    {
        if($value){
            return  $this->currency().' ' .  number_format($value, 2) ;
        }
        return $this->currency().  0 ;
    }

    public function currency()
    {
        return '$';
    }

}
