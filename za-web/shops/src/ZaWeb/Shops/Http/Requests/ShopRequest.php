<?php

namespace ZaWeb\Shops\Http\Requests;


use App\Http\Requests\Request;

class ShopRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        if ($this->method() == 'POST') {
            return [
                'city' => 'required',
                'name' => 'required',
                'category' => 'required',
                'email' => 'required|email',
                'capacity' => 'required|regex:/^\d+$/',
                'attachment' => 'image'
            ];
        } elseif ('PATCH' == $this->method()) {
            return [
                'city' => 'required',
                'profile.name' => 'required',
                'profile.email' => 'required|email',
                'attachment' => 'image'
            ];
        }
	}

    public function messages(){
        return [
            'city.required' => 'Поле Город обязательно',
            'name.required' => 'Введите название',
            'email.required' => 'Введите email',
            'category.required' => 'Выберете категорию',
            'email.email' => 'Email должен быть действительным адресом электронной почты',

            'profile.name.required' => 'Введите название',
            'profile.email.required' => 'Введите email',
            'profile.email.email' => 'Email должен быть действительным адресом электронной почты'
        ];
    }

}
