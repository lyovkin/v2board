<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class GalleryRequest extends Request {

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
        if ('POST' == $this->method()) {
            return [
                'title' => 'required',
                'columns' => 'required|regex:/^\d$/',
                'slug' => 'required|regex:/^[\w\-]+$/|unique:galleries'
            ];
        } elseif ('PATCH' == $this->method()) {
            return [
                'title' => 'required',
                'columns' => 'required|regex:/^\d$/',
                'slug' => 'required|regex:/^[\w\-]+$/'
            ];
        }
	}

}
