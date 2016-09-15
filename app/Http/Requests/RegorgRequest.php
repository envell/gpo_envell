<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegorgRequest extends Request {

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
		'hospital_name'   => 'required|string|max:255',                        // just a normal required validation
        'country_name'  => 'required|string|max:255',     // required and must be unique in the ducks table
        'city_name' => 'required|string|max:255',
        'street_name' => 'required|string|max:255',
        'home' => 'required|string|max:255',
        'index' => 'required|integer|min:0'

		];
	}
    public function messages()
    {
        return [
            'hospital_name.required' => 'Поле "Название организации" не заполнено',
            'country_name.required' => 'Поле "Страна" не заполнено',
            'city_name.required' => 'Поле "Город" не заполнено',
            'street_name.required' => 'Поле "Улица" не заполнено',
            'home.required' => 'Поле "Дом" не заполнено',
            'index.required' => 'Поле "Почтовый индекс" не заполнено'
        ];
    }
}