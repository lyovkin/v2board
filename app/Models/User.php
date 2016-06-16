<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $attributes = ['ads_rise' => 5, 'balance' => 0];

    protected $fillable = ['user_name', 'email', 'password', 'ads_rise', 'blocked', 'balance'];
    protected $guarded = ['_token'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the roles a user has
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'users_roles');
    }
    
    public function city()
    {
        return $this->belongsTo('App\Models\Cities', 'cities');
    }

    public function transaction()
    {
        return $this->belongsTo('App\Models\Payment');
    }

    public function advertisements(){
        return $this->hasMany('App\Models\Advertisement');
    }
    
    public function profile()
    {
        return $this->belongsTo('ZaWeb\Profile\Models\Profile', 'id', 'user_id');
    }
    /**
     * Find out if user has a specific role
     *
     * $return boolean
     */
    public function hasRole($check)
    {
        return in_array($check, array_fetch($this->roles->toArray(), 'name'));
    }

    /**
     * Get key in array with corresponding value
     *
     * @return int
     */
    private function getIdInArray($array, $term)
    {
        foreach ($array as $key => $value) {
            if ($value == $term) {
                return $key;
            }
        }

        throw new UnexpectedValueException;
    }


    /**
     * Favorites advertisement
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favorites()
    {
        return $this->belongsToMany('App\Models\Advertisement', 'favorites')->withTimestamps();
    }

    public function shops()
    {
        return $this->hasMany('ZaWeb\Shops\Models\Shops');
    }

    public static function getUserShops()
    {
        return \Auth::user()->shops;
    }

}
