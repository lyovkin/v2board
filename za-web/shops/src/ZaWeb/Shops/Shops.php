<?php

namespace ZaWeb\Shops;

use Illuminate\Support\Facades\Config;


class Shops
{
    public function hi(){
        return Config::get("core::message");
    }
}