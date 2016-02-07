<?php namespace ZaWeb\Questions\Services\Questions;

use ZaWeb\Questions\Repositories\Questions\QuestionsInterface;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use ZaWeb\Questions\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Facades\ImageUploadFacade;
use ZaWeb\Questions\Models\QuestionAttachment;
class QuestionsService
{
    protected $questionsRepo;
    
    public function __construct(QuestionsInterface $questionsRepo)
    {
        $this->questionsRepo = $questionsRepo;
    }
    
    
    /**
     * View questions list
     * 
     * @param Model $model
     * @return view
     */
    public function viewQuestions($model)
    {
        $data = $this->questionsRepo->get($model);
        return View::make('questions::question', ['data'=>$data])->render();
    }
    
    /**
     * View question
     * 
     * @param Model $model
     * @return view
     */
    public function viewQuestion($id)
    {
        $data = $this->questionsRepo->getQuestionById($id);
        return View::make('questions::show', ['data'=>$data])->render();
    }
    

    /**
     * Save question to database
     * 
     */
    public function saveQuestion($data)
    {
        $question = new Question();
        /*$question->title = $data['title'];*/
        $question->text = $data['text'];
        $question->user_id = \Auth::user()->id;
        if(\Auth::user()->profile->city_id) {
            $question->city_id = \Auth::user()->profile->city_id;
        }
        $question->attachment_hash = Session::get('questions_hash');
        $question->save();
    }
    
    /**
     * Upload attachment to storage
     * 
     * @param Request $request
     * @return Response
     */
    public function uploadAttachment($request)
    {
        return ImageUploadFacade::attachmentUpload($request, new QuestionAttachment, 'questions', true);

    }



}



