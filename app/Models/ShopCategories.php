<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShopCategories
 * @package App\Models
 */
class ShopCategories extends Model {

	protected $table = 'shop_category';

    protected $fillable = array('name', 'description');

    public $timestamps = false;

    public static function getShopCategories($shop_id)
    {
       return \DB::select("select cat.name, cat.id
                                      from categories_shops d
                                      join shops m on d.shop_id = m.id
                             		  join items_category cat on d.category_id = cat.id
                             		  where m.id = $shop_id");
    }
}
