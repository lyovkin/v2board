<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaidServiceRequest;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * Class PaidServicesController
 * @package App\Http\Controllers
 */
class PaidServicesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('paidservices.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('paidservices.create', compact('user'));
        }else{
            Session::flash('message', "Пожалуйста, войдите или зарегистрируйтесь");
            return redirect('paidservices')->withErrors('errors.basic');
        }
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PaidServiceRequest $request)
	{
        $proposal = $request->all();
        Proposal::create($proposal);
        return redirect('paidservices');
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

    /**
     * Redirect to form add balance
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function balance()
    {
        if(\Auth::check()){
            return view('paidservices.balance');
        }
        return redirect()->back();
    }

    /**
     * Redirect to form add rises
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function rise()
    {
        if(\Auth::check()){
            return view('paidservices.rise');
        }
        return redirect()->back();
    }

}
