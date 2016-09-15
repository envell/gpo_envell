<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class OutpatientRequest extends Request {

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
		'bed_numbers_facts'             => 'required|integer|min:0',                        // just a normal required validation
        'composed_at_beginning'            => 'required|integer|min:0',     // required and must be unique in the ducks table
        'written_out'         => 'required|integer|min:0',
        'received' => 'required|integer|min:0',
			//
		];
	}
    public function messages()
    {
        return [
            'bed_numbers_facts.required' => 'Поле "Количество коек (план)" не заполнено',
            'composed_at_beginning.required' => 'Поле "Состояло на начало дня" не заполнено',
            'written_out.required' => 'Поле "Выписано" не заполнено',
            'received.required' => 'Поле "Поступило" не заполнено'
        ];
    }
}