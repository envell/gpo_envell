<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Hash;

class SettingsRequest extends Request {

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
		'email'             => 'email',                        // just a normal required validation
        'phone'            => 'numeric',     // required and must be unique in the ducks table
        'old_password'         => '|oldpass',
        'password' => 'different:old_password',           // required and has to match the password field
        'password_confirmation' => 'same:password',
   //     'id' => 'required|integer|min:0'
			//
		];
	}
    public function messages()
    {
        return [
            'old_password.oldpass'  => 'Неверный пароль',
            'required' => 'Поле "Количество коек (план)" не заполнено',
            'composed_at_beginning.required' => 'Поле "Состояло на начало дня" не заполнено',
            'written_out.required' => 'Поле "Поступило" не заполнено',
            'died.required' => 'Поле "Выписано" не заполнено',
            'received.required' => 'Поле "Умерло (без поступивших)" не заполнено'
                  
        ];
    }
}
