<?php

namespace App\Handlers\Events;

use App\Events\CreateComment;
use App\Models\Nottifications;

class SendNottification
{

    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreateComment $event
     * @return void
     */
    public function handle(CreateComment $event)
    {
        $nottifiactions = new Nottifications();

        $nottifiactions->obj_type = $event->objType;
        $nottifiactions->obj_id = $event->objId;
        $nottifiactions->user_id = $event->userId;
        $nottifiactions->comment_id = $event->commentId;

        $nottifiactions->save();
    }


}
