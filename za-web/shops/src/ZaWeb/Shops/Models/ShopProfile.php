<?php

namespace ZaWeb\Shops\Models;

use Illuminate\Database\Eloquent\Model;

class ShopProfile extends Model
{
    /**
     * @var string
     */
    protected $table = "shop_profiles";

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'phone', 'email'];

    /**
     * @var array
     */
    protected $guarded = [];

    public $timestamps = false; 

}