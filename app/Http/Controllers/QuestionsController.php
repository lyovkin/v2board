<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use ZaWeb\Core\Controllers\AbstractController;
use ZaWeb\Questions\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * @Resource("questions")
 */
class QuestionsController extends AbstractController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\Auth::user() && \Auth::user()->profile->city_id != null) {
            $questions = Question::where('city_id', '=', \Auth::user()->profile->city_id)->orderBy('id', 'desc')->paginate(5);

            return view('questions::index', compact('questions'));
        } else {
            $questions = Question::orderBy('id', 'desc')->paginate(5);

            return view('questions::index', compact('questions'));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @Middleware("auth")
     * @return Response
     */
    public function create()
    {
        Session::forget('question_hash');

        return view('questions::create');
    }

    /**
     * Upload attachment to storage
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if (!Session::has('questions_hash')) {
            Session::put('questions_hash', md5(time()));

        }
        return Response::json([
            'attachment'=>\QuestionsService::uploadAttachment($request->file('upl'))
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return \QuestionsService::viewQuestion($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(PageName $pageName)
    {
        return view('admin.pagename.edit', ['pageName' => $pageName]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(PageName $pageName, Request $request)
    {
        $pageName->update($request->input());
        return redirect()->route('admin.pagename.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(PageName $pageName)
    {
        $pageName->delete();
        return redirect()->route('admin.pagename.index');
    }
    
    /**
     * Save question in database
     * 
     * 
     */
    public function flush(\App\Http\Requests\QuestionRequest $request)
    {
        \QuestionsService::saveQuestion($request->all());
        Session::forget('questions_hash');
        return Redirect::to('/questions');
    }

}
