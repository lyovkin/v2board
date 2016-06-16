<?php

namespace ZaWeb\Shops\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shops extends Model
{
    /**
     * @var string
     */
    protected $table = "shops";

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'capacity', 'category_id'];

    /**
     * @var array
     */
    protected $guarded = ['_token'];

    public function attachment()
    {
        return $this->belongsTo('App\Models\Attachment');
    }

    public function canAddItem(){
        $count = (int) DB::table('shop_items')
                        ->select(DB::raw('count(*) as c'))
                        ->where('shop_id', '=', $this->id)
                        ->first()
                        ->c;

        return ($this->capacity > $count);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function profile()
    {
        return $this->belongsTo('ZaWeb\Shops\Models\ShopProfile');
    }

    public function items()
    {
        return $this->hasMany('ZaWeb\Shops\Models\ShopItems', 'shop_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\Cities', 'city_id', 'id');
    }


}