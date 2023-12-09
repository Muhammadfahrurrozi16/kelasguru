<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class mapelrequest extends FormRequest
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
            'nama_mapel' => 'required',
            'tingkat_sekolah_id' => 'required|numeric',
            'is_active' => 'required|numeric',
            'keterangan' => 'required'
        ];
    }

    public function messages()
    {
        return
        [
        'nama_mapel.required' => 'kolom nama mata pelajaran perlu di isi',
        'keterangan.required' => 'kolom keterangan perlu di isi',
        'is_active.required' => 'kolom status harus di pilih',
        'tingkat_sekolah_id.required' => 'kolom tingkat sekolah harus di pilih'
        ];

    }
}
