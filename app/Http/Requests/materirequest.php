<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class materirequest extends FormRequest
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
            'name' => 'required',
            'mapel_id' => 'required|numeric',
            'materi' => 'required',
            'is_active' => 'required',
            'sinopsis' => 'required'
        ];
    }

    public function messages()
    {
        return
        [
            'name.required' => 'kolom judul perlu di isi',
            'mapel_id.required' => 'kolom mapel perlu di pilih',
            'is_active.required' => 'kolom status perlu di pilih',
            'materi.required' => 'kolom materi perlu di pilih',
            'sinopsis.required' => 'kolom sinopsis perlu di pilih',
        ];
    }
}
