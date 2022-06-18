<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable=([
        'id',
        'titre_annonce',
        'description_annonce',
        'type_annonce',
        'niveau_etude',
        'secteur_activite',
        'user_id'
    ]);

    protected $hidden = [
        'created_at',
        'updated_at',
       
    ];
    public function ancandidats(){
        return $this->hasOne(Annoncecandidat::class,);
    }
    public function anrecruteurs(){
        return $this->hasOne(Annoncerecruteur::class);
    }
    public function users(){
        return $this->belongsTo(Annonce::class,'user_id','id');
    }

}
