<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnnonceRequest extends FormRequest
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
            'titre_annonce'=>'required',
            'description_annonce'=>'required',
            'type_annonce'=>'required',
            'niveau_etude'=>'required',
            'secteur_activite'=>'required'
        ];
    }
}
