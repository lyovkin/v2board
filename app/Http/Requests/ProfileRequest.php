<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\User;

class ProfileRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = \Auth::user();
        return [
            'user_name' => 'unique:users,user_name,'.$user->id,
            'password' => 'min:6|confirmed',
            'email' => 'unique:users,email,'.$user->id,
            ];
        }


	public function messages()
	{
            return [
                'required' => 'Заполните все поля',
                'user_name.unique' => 'Пользователь  с таким логином уже зарегестрирован',
                'email.unique' => 'Пользователь  с таким Email уже зарегестрирован',
                'password.min' => 'Пароль должен содержать минимум 6 символов',
                'password.confirmed' => 'Пароли не совпадают'
            ];

	}

        public function authorize()
        {
            return true;
        }

}
