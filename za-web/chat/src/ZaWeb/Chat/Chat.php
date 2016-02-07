<?php

namespace ZaWeb\Chat;

use Illuminate\Support\Facades\Config;


class Chat
{
    public function hi(){
        return Config::get("core::message");
    }
}