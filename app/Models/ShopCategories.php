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
}
