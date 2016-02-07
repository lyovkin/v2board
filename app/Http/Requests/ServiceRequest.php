<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest {

    /**
     * @var array
     */
    protected $dontFlash = ['attachment'];

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
     * @var array
     */
    protected $rules = [
        'link' => 'required|min:2|url',
        'text' => 'required|min:2',
        'upl'   => 'required|image|max:10000|mimes:jpeg,jpg,bmp,png,gif'
    ];

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        if(preg_match_all('/edit/', $this->server('HTTP_REFERER')))
        {
            $this->rules['upl'] = 'max:10000|image|mimes:jpeg,jpg,bmp,png,gif';
        }
        return $this->rules;
	}

    /**
     * Set custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Введите заголовок',
            'text.required' => 'Введите описание',
            'title.min' => 'Заголовок слишком короткий',
            'text.min' => 'Описание слишком короткое',
            'upl' => 'Выберите картинку',

        ];
    }

}
