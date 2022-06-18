<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annoncerecruteur extends Model
{
    use HasFactory;

    protected $fillable=([
        'salaire',
        'annonce_id',
        'contrat',
        'user_id'

    ]);
    protected $hidden=([
        'created_at',
        'updated_at'
    ]);
    
    public function annonces(){
        return $this->belongsTo(Annonce::class);
    }
}
