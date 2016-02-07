<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'attachment' => 'required'
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
        
        /**
         * 
         * @return array
         */
        public function messages()
        {
            //:values
            return [
                'attachment.required' => 'Необходимо заполнить поле :attribute',
                'required' => 'Необходимо заполнить поле :attribute',
                'min' => 'Значение поля :attribute, должно быть не менье 3х символов',
            ];
        }
}
