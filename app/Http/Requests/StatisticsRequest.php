<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StatisticsRequest extends Request {

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
		'bed_numbers_facts'   => 'required|integer|min:0',                        // just a normal required validation
        'composed_at_beginning'   => 'required|integer|min:0',     // required and must be unique in the ducks table
        'written_out'   => 'required|integer|min:0',
        'died' => 'required|integer|min:0',           // required and has to match the password field
        'received' => 'required|integer|min:0',
        'held_beddays' => 'required|integer|min:0',
        'id' => 'required|integer|min:0'

			//
		];
	}
    public function messages()
    {
        return [
            'required' => 'Поле "Количество коек (план)" не заполнено',
            'composed_at_beginning.required' => 'Поле "Состояло на начало дня" не заполнено',
            'written_out.required' => 'Поле "Поступило" не заполнено',
            'died.required' => 'Поле "Выписано" не заполнено',
            'received.required' => 'Поле "Умерло (без поступивших)" не заполнено',
            'held_beddays' => 'Поле "Проведено койко-дней" не заполнено'
                  
        ];
    }
}
