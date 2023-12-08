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
            'name' => 'required|unique:users',
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
            'name.required' => 'kolom nama perlu di isi',
            'username.required' => 'kolom username perlu di isi',
            'email.required' => 'kolom email perlu di isi',
            'password.required' => 'kolom password perlu di isi',
            'bio.required' => 'kolom bio perlu di isi',
            'phone.required' => 'kolom phone perlu di isi',
            'roles_id.required' => 'kolom role perlu di pilih',
            'sekolah_id.required' => 'kolom sekolah perlu di pilih'
        ];
    }
}
