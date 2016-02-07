<?php   namespace App\Services\Users;

use App\Models\User;
use App\Repositories\Users\UsersInterface;
use Illuminate\Support\Facades\Auth;

class UsersService
{
    
    protected $usersRepo;
    
    /**
     * 
     * @param usersInterface $usersRepo
     */
    public function __construct(UsersInterface $usersRepo)
    {

        $this->usersRepo = $usersRepo;
        
    }


    
    public function getUser($user)
    {
        if(is_numeric($user))
        {
            $user = $this->usersRepo->getUserById($user);
        }
        else
        {
            $user = $this->usersRepo->getUserByName($user);
        }
        
        if($user != null)
        {
            return $user->name;
        }
        
        return 'User not found';
    }

    public function update($data, $model)
    {
        if(!is_array($data))
        {
            $model->fill($data->all());
        }
        else
        {
            $model->fill($data);
        }        $model->save();
    }
    public function getInfo($param)
    {
        $model = User::where('id', Auth::user()->id)->get()->toArray();

        return $model[0][$param];
    }

    

    
}
