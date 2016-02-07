<?php   namespace App\Repositories\Users;

use \Illuminate\Database\Eloquent\Model;

class UsersRepository implements UsersInterface
{
    protected $usersModel;
    
    /**
     * 
     * @param Model $users
     * @return UsersRepositiry
     */
    public function __construct(Model $users)
    {
        $this->usersModel = $users;
    }
    
    /**
     * Get user by id
     * 
     * @param mixed $userId
     * @return Model
     */
    public function getUserById($userId)
    {
        return $this->convertFormat($this->usersModel->find($userId));
    }
    
    /**
     * 
     * @param string $userName
     * @return model
     */
    public function getUserByName($userName)
    {
        $user = $this->usersModel->where('name', strtolower($userName));
        
        if($user)
        {
            return $this->convertFormat($user->first());
        }
        
        return null;
    }
    
    /**
     * 
     * @param mixed $user
     * @return \stdClass
     */
    protected function convertFormat($user)
    {
        return $user ? (object) $user->toArray() : null;
    }
}

