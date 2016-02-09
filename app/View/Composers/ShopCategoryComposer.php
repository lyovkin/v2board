<?php
/**
 * Created by PhpStorm.
 * User: anatoliy
 * Date: 09.02.16
 * Time: 12:41
 */

namespace App\View\Composers;

use Illuminate\Contracts\View\View;
use App\Models\ShopCategories;

/**
 * Class ShopCategoryComposer
 * @package App\View\Composers
 */
class ShopCategoryComposer
{
    /**
     * @var \Illuminate\Database\Eloquent\Collection|static[]
     */
    protected $links;

    /**
     * ShopCategoryComposer constructor.
     */
    public function __construct()
    {
        $this->links = ShopCategories::all();
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('links', $this->links);
    }
}