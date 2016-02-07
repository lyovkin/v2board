<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class RegisterRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            /*'name' => 'required|max:32|min:2',
            'last_name' => 'required|max:32|min:3',*/
            'city' => 'required',
            'email' => 'required|email|max:255|unique:users',
            /*'user_name' => 'required|max:16|min:4|unique:users',*/
            'password' => 'required|min:6|confirmed',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            /*'name.required' => 'Введите имя',
            'name.max' => 'Имя слишком длинное',
            'name.min' => 'Имя слишком короткое',*/
            /*'last_name.required' => 'Введите фамилию',
            'last_name.max' => 'Фамилия слишком длинная',
            'last_name.min' => 'Фамилия слишком короткая',*/
            'email.required' => 'Заполните поле email',
            'email.email' => 'Введите правильный email',
            'email.max' => 'Email слишком длинный',
            'email.unique' => 'Пользователь с таким email уже зарегестрирован',
            'user_name.required' => 'Введите логин',
            'user_name.min' => 'Логин слишком короткий',
            'user_name.max' => 'Логин слишком длинный',
            'user_name.unique' => 'Пользователь с таким логином уже есть в базе',
            'password.min' => 'Пароль должен содержать минимум 6 символов',
            'password.confirmed' => 'Пароли не совпадают',
            'password.required' => 'Введите пароль'

        ];
    }

}
