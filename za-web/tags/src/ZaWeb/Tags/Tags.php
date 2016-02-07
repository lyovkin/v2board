<?php

namespace ZaWeb\Tags;

use Illuminate\Support\Facades\Config;


class Tags
{
    public function hi(){
        return Config::get("core::message");
    }
}