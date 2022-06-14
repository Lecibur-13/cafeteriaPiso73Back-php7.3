<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use JetBrains\PhpStorm\ArrayShape;

class LoginRequest extends FormRequest
{
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
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
   public function messages(): array
    {
        return [
            'email.required' => 'email requerido',
            'password.required'  => 'Password requerido',
        ];
    }

    public function response(array $errors){
        return response()->json($errors, 400);

    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
