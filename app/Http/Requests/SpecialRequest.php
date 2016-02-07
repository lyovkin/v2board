<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SpecialRequest extends Request {

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
		return [
            'link' => 'required|min:2|url',
            'text' => 'required|min:2',
            'price' => 'required|regex:/^\d+$/',
            'upl'   => 'image|max:10000|mimes:jpeg,jpg,bmp,png,gif'
		];
	}

    public function messages()
    {
        return [
            'link.required' => 'Введите ссылку',
            'link.min' => 'Ссылка слишком короткая',
            'link.url' => 'Ссылка не соответствует формату',
            'text.required' => 'Введите текст',
            'text.min' => 'Текст слишком короткий',
            'price.required' => 'Введите цену',
            'price.regex' => 'Цена должна быть числом',
            'upl' => 'Выберите картинку',

        ];
    }

}
