<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StafRequest extends Request {

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
		
		return [    // required and must be unique in the ducks table
        'lastname'         => 'required|string|max:255',
        'firstname' => 'required|string|max:255',
        'middlename'         => 'required|string|max:255',
        'post'         => 'required|integer|max:255',
        'rates_fact' => 'required|integer|min:0',
			//
		];
	}
    public function messages()
    {
        return [
            'lastname' => 'Поле "Фамилия" не заполнено',
            'firstname' => 'Поле "Имя" не заполнено',
            'middlename' => 'Поле "Отчество" не заполнено',
            'post' => 'Поле "Должность" не заполнено',
            'rates_fact' => 'Поле "Количество ставок" не заполнено'
        ];
    }
}