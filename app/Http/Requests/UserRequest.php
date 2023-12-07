<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'require|unique:users|max:10',
            'username' => 'required|unique:users',
            'email' => 'required|email',
            'password' => 'required',
            'roles_id' =>'required|numeric',
            'bio' => 'required|string',
            'phone' => 'required|numeric',
            'sekolah_id' => 'required|numeric'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ''

        ];
    }
}
