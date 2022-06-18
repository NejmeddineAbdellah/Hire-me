<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annoncecandidat extends Model
{
    use HasFactory;

    protected $fillable=([
        'cv_candidat',
        'annonce_id',
        'user_id',
        'type_annonce_candidat'

        
    ]);

    protected $hidden=([
        'created_at',
        'updated_at'
    ]);

    public function annonces(){
        return $this->belongsTo(Annonce::class,'annonce_id','id');
    }
}
