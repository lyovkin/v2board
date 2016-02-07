<?php namespace ZaWeb\Profile\Services\Profile;

use ZaWeb\Profile\Repositories\Profile\ProfileInterface;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use ZaWeb\Profile\Models\Profile;
use App\Facades\ImageUploadFacade;
use ZaWeb\Profile\Models\ProfileAttachment;

class ProfileService
{
    protected $profileRepo;
    
    public function __construct(ProfileInterface $profileRepo)
    {
        $this->profileRepo = $profileRepo;
    }
    
    /**
     * View profile
     * 
     * @param Model $model
     * @return view
     */
    public function viewProfile($model)
    {
        $view = View::make('profile::profile', ['data'=>$model])->render();
        if($model->user_id != Auth::user()->id)
        {
            $view = View::make('profile::user_profile', ['data'=>$model])->render();

        }
        return $view;
    }

    
    /**
     * Create user profile
     *
     * @param Request $data
     * @param type $id int
     */
    public function createProfile($data, $id)
    {
        $profile = new Profile;
        //$profile->name = $data->name;
        //$profile->last_name = $data->last_name;
        $profile->user_id = $id;
        $profile->city_id = $data->city;
        $profile->about = "about me";
        $profile->save();
    }

    /**
     * Update user profile
     */
    public function updateProfile($data, $model)
    {
//        if(!is_array($data))
//        {
//            $model->fill($data->all());
//        }
//        else
//        {
//            $model->fill($data);
//        }

        if (!is_array($data)) {
            $data = $data->all();
        }

        if (isset($data['city'])) {
            $data['city_id'] = $data['city'];
        } else {
            $model->city()->dissociate();
        }

        $model->fill($data);


        $model->save();
        //Profile::where('user_id', Auth::user()->id)->update($data->all());
    }

    /**
     * Upload profile image
     */
    public function uploadImage($request, $model)
    {
        if(\Request::file('upl')) {
            $image = ImageUploadFacade::attachmentUpload($request->file('upl'), new ProfileAttachment, 'profile');
            $this->updateProfile(['attachment_id' => $image->id], $model);

            return $image;
        }
    }


}



