<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidatRequest extends FormRequest
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
            'nom_candidat'=>'required',
            'prenom_candidat'=>'required',
            'image_candidat'=>'nullable|file|size:2048|mimes:jpg,bmp,png',
            'niveau_etude'=>'required',
            'cv_candidat'=>'nullable|mimes:pdf',
        ];
    }
}
