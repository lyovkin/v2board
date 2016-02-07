<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Nottifications;

/**
 * @Resource("nottifications")
 * @Middleware("auth")
 */
class NottifactionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$nottifications = Nottifications::where('is_read', false)->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
		return view('nottifications.index', ['nottifications'=>$nottifications]);
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
	public function store()
	{
		//
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
	 * @GET("/nottifications/{id}/delete/", as="nottifications.destroy")
	 */
	public function destroy($id)
	{
		$model = Nottifications::where('id', $id)->first();
		if($model->user->id != Auth::user()->id)
		{
			App::abort(404);
		}
		else
		{
			$model->delete();
		}
	}

}
