<?php

namespace AppAdmin\Http\Controllers;

use App\Facades\ImageUploadFacade;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Annotations\Annotations\Controller;
use ZaWeb\Core\Controllers\AbstractAdminController;

/**
 * @Resource("questions")
 * @Controller(prefix="/admin")
 * @Middleware("admin")
 */
class AdminQuestionsController extends AbstractAdminController
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->paginate(5);
        return view('admin.questions.index', ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Question $questions
     * @return Response
     */
    public function create(Question $questions)
    {
        return view('admin.questions.create', ['questions' => $questions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Question $questions
     * @param QuestionRequest $request
     * @return Response
     */
    public function store(Question $questions, QuestionRequest $request)
    {
        $attachment = ImageUploadFacade::image($request->file('attachment'));
        $questions->fill($request->all())->attachment()->associate($attachment);
        $questions->save();

        return redirect()->route('admin.questions.index');
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
     * @param Question $questions
     * @return Response
     */
    public function edit(Question $questions)
    {
        return view('admin.questions.edit', ['questions' => $questions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Question $questions
     * @param CategoryRequest $request
     * @return Response
     */
    public function update(Question $questions, QuestionRequest $request)
    {
        $attachment = ImageUploadFacade::image($request->file('attachment'));
        $questions->fill($request->all());
        if ($attachment) {
            $questions->attachment()->associate($attachment);

        }
        $questions->save();

        return redirect()->route('admin.questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $questions
     * @throws \Exception
     * @return Response
     */
    public function destroy(Question $questions)
    {
        $questions->delete();
        return redirect()->route('admin.questions.index');
    }


}
