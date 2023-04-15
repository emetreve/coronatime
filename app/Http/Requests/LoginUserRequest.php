<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'password' => 'required',
			'username' => 'required|min:3',
			'remember' => 'boolean|nullable',
		];
	}

	public function validationData()
	{
		$this->merge([
			'remember' => (bool) $this->input('remember'),
		]);

		return parent::validationData();
	}
}
