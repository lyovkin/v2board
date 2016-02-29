<?php

namespace ZaWeb\Shops\Http\Controllers;

use App\Http\Controllers\Controller;

use Collective\Annotations\Routing\Annotations\Annotations\Get;
use Collective\Annotations\Routing\Annotations\Annotations\Middleware;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use ZaWeb\Shops\Models\ShopItems;
use ZaWeb\Shops\Models\Shops;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    /**
     * @Get("/cart")
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('shops::cart');
    }

    /**
     * Send orders
     * @Post("/cart/send_order", as="order.send")
     */
    public function send(Request $request)
    {
        $client = $request->user;
        $cart = $request->cart;

        $totalSum = 0;
        foreach($cart as $item)
        {
            $itemInShop = ShopItems::find($item['_id']);
            $totalSum+=$itemInShop->price*$item['_quantity'];

            $items[$item['_data']['partner']][] = [
                'id' => $itemInShop->id,
                'name' => $itemInShop->name,
                'price' => $itemInShop->price,
                'quantity' => $item['_quantity']
            ];
        }

        foreach($items as $id=>$positions)
        {
            $data = [
                'items' => $positions,
                'client' => $client,
                'totalSum' => $totalSum
            ];
            $shop = Shops::find($id);
            \Mail::send('shops::emails.order', $data, function($message) use($shop)
            {
                $message->from('board@mail.com', 'Новый заказ');

                $message->to($shop->profile->email)->subject('Новый заказ');

            });
        }

    }

    /**
     * @Get("/cart/get_user")
     */
    public function getUserData()
    {
        $user = \Auth::user()->profile;

        $data = [
            'name' => $user->name,
            'phone' => $user->phone
        ];

        return Response::json($data);

    }

    /**
     * @Post("/cart/test")
     */
    public function test(Request $request)
    {
        $client = $request->user;
        $cart = $request->cart;

        $totalSum = 0;
        foreach ($cart as $item) {
            $itemInShop = ShopItems::find($item['_id']);
            $totalSum += $itemInShop->price * $item['_quantity'];

            $items[$item['_data']['partner']][] = [
                'id' => $itemInShop->id,
                'name' => $itemInShop->name,
                'price' => $itemInShop->price,
                'art' => $itemInShop->art_number,
                'description' => mb_substr($itemInShop->description, 0, 200) . '...',
                'pic' => $itemInShop->attachment->url,
                'quantity' => $item['_quantity']
            ];
        }

        foreach ($items as $id => $positions) {
            $data = [
                'items' => $positions,
                'client' => $client,
                'totalSum' => $totalSum
            ];
            // $shop = Shops::find($id);
            \Mail::send('shops::emails.order', $data, function ($message) {
                $message->from('board@mail.com', 'Test');

                $message->to('anatoliymolinari@gmail.com')->subject('Test');

            });
        }
    }

}
