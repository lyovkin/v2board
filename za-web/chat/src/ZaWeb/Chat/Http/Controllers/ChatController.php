<?php


namespace ZaWeb\Chat\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class ChatController
 * @package ZaWeb\Chat\Http\Controllers
 * @Resource("chat")
 * @Middleware("auth")
 */
class ChatController extends Controller
{

    public function index()
    {
        return view('chat::index');
    }
}