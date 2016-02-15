<?php
namespace ZaWeb\Shops\Http\Requests;

use App\Http\Requests\Request;

class ShopItemsRequest extends Request {

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
            'name' => 'required',
			'category_id' => 'required',
			'attachment' => 'required|image'
		];
	}

    public function messages(){
        return [
            'name.required' => 'Введите имя товара',
			'category_id.required' => 'Выберете категорию товара',
            'attachment.required' => 'Загрузите изображение',
            'attachment.image' => 'Загруженый файл должен быть изображением'
        ];
    }

}
