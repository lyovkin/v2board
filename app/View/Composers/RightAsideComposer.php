<?php

namespace App\View\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Banner;
use Auth;

class RightAsideComposer
{
    const BLOCK_COUNT = 2; // Количество блоков содержищих банеры

    protected $blocks = [[]];

    public function __construct(Request $request, Banner $banners)
    {
        if (Auth::user() && Auth::user()->profile->city_id != null) {
            $model = Banner::where('paid', '1')->where('paid_up', '>=', new \DateTime('today'))->where('city_id', '=', Auth::user()->profile->city_id)->get();

            $blockIndex = 0;
            $bannerIndex = 0;

            foreach ($model as $one) {
                if ($blockIndex == self::BLOCK_COUNT) {
                    $bannerIndex++;
                    $blockIndex = 0;
                }

                $this->blocks[$blockIndex++][$bannerIndex] = $one;
            }
        }
        else{
            $model = Banner::where('paid', '1')->where('paid_up', '>=', new \DateTime('today'))->get();

            $blockIndex = 0;
            $bannerIndex = 0;

            foreach ($model as $one) {
                if ($blockIndex == self::BLOCK_COUNT) {
                    $bannerIndex++;
                    $blockIndex = 0;
                }

                $this->blocks[$blockIndex++][$bannerIndex] = $one;
            }
        }
    }
    public  function compose(View $view)
    {
        $view->with('blocks', $this->blocks);
    }
}