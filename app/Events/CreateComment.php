<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class CreateComment extends Event {

	use SerializesModels;


	public $objType;

	public $objId;

	public $userId;

	public $commentId;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($objType, $objId, $userId, $commentId)
	{
		$this->objType = $objType;
		$this->objId = $objId;
		$this->userId = $userId;
		$this->commentId = $commentId;
	}

}
