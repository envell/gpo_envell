<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PoliclinicaRequest extends Request {

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
		'all'             => 'required|integer|min:0',                        // just a normal required validation
        'disease'            => 'required|integer|min:0',     // required and must be unique in the ducks table
        'preventive'         => 'required|integer|min:0',
        'OMC' => 'required|numeric|min:0',
        'budget'         => 'required|numeric|min:0',
        'paid' => 'required|numeric|min:0',
			//
		];
	}
    public function messages()
    {
        return [
            'all' => 'Поле "Всего" не заполнено',
            'disease' => 'Поле "По заболеванию" не заполнено',
            'preventive' => 'Поле "Профилактические" не заполнено',
            'OMC' => 'Поле "ОМС" не заполнено',
            'budget' => 'Поле "Бюджет" не заполнено',
            'paid' => 'Поле "Платные" не заполнено'
        ];
    }
}