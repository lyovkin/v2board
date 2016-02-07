<?php namespace ZaWeb\News\Services\News;

use ZaWeb\News\Repositories\News\NewsInterface;

use Illuminate\Support\Facades\View;
class NewsService
{
    protected $newsRepo;
    
    public function __construct(NewsInterface $tagRepo)
    {
        $this->newsRepo = $tagRepo;
    }
    
    
    public function viewNews($model)
    {
        $data = $this->newsRepo->get($model);
        return View::make('news::article', ['data'=>$data])->render();
    }
    
    
    public function viewArticle($model)
    {
        $data = $this->newsRepo->get($model);
        return View::make('news::single.article', ['data'=>$data])->render(); 
    }
    


}



