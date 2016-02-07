<?php

namespace ZaWeb\Chat\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use ZaWeb\Chat\Http\Requests\ChatRequest;
use ZaWeb\Chat\Models\Chat;
use Illuminate\Support\Facades\Auth;

/**
 * Class ChatController
 * @package ZaWeb\Chat\Http\Controllers
 * @Middleware("auth")
 */
class MessagesController extends Controller
{

    /**
     * @Get("/chat/messages/get/{limit?}")
     */
    public function getMessages($limit = null)
    {
        $messages = Chat::with('user')->orderBy('created_at', 'asc')->get();

        if($limit)
        {
            $messages = Chat::with('user')->orderBy('created_at', 'asc')->take($limit)->get();
        }

        return Response::json($messages);

    }

    /**
     * @Put("/chat/messages/create")
     *
     */
    public function createMessage(ChatRequest $request)
    {
        $message = new Chat();
        $message->fill($request->all());
        $message->user()->associate(Auth::user());
        $message->save();


        return Response::json([
            'id' => $message->id
        ]);
    }

    /**
     * @Delete("/chat/messages/delete/{id}")
     * @Middleware("admin")
     */
    public function deleteMessages($id)
    {
        $message = Chat::where('id', $id)->delete();

        return Response::json([
            'id' => $id,
            'status' => 'DELETED'
        ]);
    }



}