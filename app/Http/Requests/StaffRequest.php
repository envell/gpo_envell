<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StaffRequest extends Request {

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
		'post'             => 'required|string|max:255|unique:users',                        // just a normal required validation
        'staff_number_id' => 'required|integer|max:255',     // required and must be unique in the ducks table

			//
		];
	}
    public function messages()
    {
        return [
            'post' => 'Поле "Должность" не заполнено',
            'staff_number_id' => 'Поле "Штат" не заполнено',
        ];
    }
}