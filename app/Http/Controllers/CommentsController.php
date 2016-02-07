<?php namespace App\Http\Controllers;

use App\Events\CreateComment;
use App\Events\Nottification;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Event;
use Illuminate\Http\Request;
use App\Models\Comments;
use App\Http\Requests\CommentsRequest;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CommentsRequest $request)
	{
            $comment = new Comments;
            $comment->text = $request->text;
            $comment->ads_id = $request->ads_id;
            $comment->user_id = Auth::user()->id;

			$comment->save();
			Event::fire(new CreateComment($request->type, $request->ads_id, $request->user_id, $comment->id));


		return \Redirect::to('/ads/'.$request->ads_id);
            
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
