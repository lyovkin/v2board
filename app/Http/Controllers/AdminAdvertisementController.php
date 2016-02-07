<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Routing\Annotations\Annotations\Get;
use Symfony\Component\HttpFoundation\Response;
use ZaWeb\Core\Controllers\AbstractAdminController;
use Illuminate\Contracts\Routing\Middleware;

/**
 * @Resource("/admin/advertisement")
 * @Middleware("admin")
 */
class AdminAdvertisementController extends AbstractAdminController
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.advertisement.index');
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
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin.advertisement.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
