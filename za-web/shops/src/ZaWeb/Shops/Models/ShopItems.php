<?php namespace ZaWeb\Shops\Models;

use Illuminate\Database\Eloquent\Model;

class ShopItems extends Model {

    protected $fillable = ['name', 'art_number', 'description', 'price', 'shop_id', 'category_id'];

    public function attachment()
    {
        return $this->belongsTo('App\Models\Attachment');
    }

    public function shop()
    {
        return $this->belongsTo('ZaWeb\Shops\Models\Shops');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\ItemsCategory');
    }

}
