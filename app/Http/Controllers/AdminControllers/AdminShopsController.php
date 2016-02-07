<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use ZaWeb\Shops\Models\Shops;

class AdminShopsController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $shops = Shops::all()->sortByDesc('id');
       // dd($shops);
        return view('admin.shops.index', compact('shops'));
    }

    /**
     * @param Shops $shop
     * @return \Illuminate\View\View
     */
    public function edit(Shops $shop)
    {
        $shop = Shops::where('id', $shop->id)->first();
        return view('admin.shops.edit', compact('shop'));
    }

    /**
     * @param Shops $shop
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Shops $shop)
    {
        $input = \Request::only('paid_at')['paid_at'];
        $shop->paid_at = $input;
        $shop->update();
        return redirect()->route('admin.shops.index');
    }
    /**
     * @param Shops $shop
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Shops $shop)
    {
        $shop->delete();
        return redirect()->route('admin.shops.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function block($id)
    {
        $shop = Shops::find($id);
        $input = \Request::only('blocked')['blocked'];
        $shop->blocked = $input;
        $shop->update();
        return redirect()->route('admin.shops.index');
    }
}