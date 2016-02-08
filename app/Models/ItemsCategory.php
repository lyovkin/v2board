<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ItemsCategory
 * @package App
 */
class ItemsCategory extends Model {

	protected $table = 'items_category';

    protected $fillable = array('name', 'description');

    public $timestamps = false;

}
