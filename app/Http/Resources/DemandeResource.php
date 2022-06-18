<?php

namespace App\Http\Resources;

use App\Models\Annonce;
use App\Models\Demande;
use App\Models\Candidat;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class DemandeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'user_id' =>User::find($this->user_id)->username,
            'id_annonce' =>Annonce::find($this->id_annonce)->titre_annonce,
            'lettre_motivation' => $this->lettre_motivation,


        ];

        return parent::toArray($request);
    }
}
