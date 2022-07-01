<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    
    protected $fillable=([
        'id',
        'nom_candidat',
        'prenom_candidat',
        'image_candidat',
        'niveau_etude',
        'cv_candidat',
        'user_id'
        
    ]);

    protected $hidden=([
        'created_at',
        'updated_at'
    ]);

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
 
}
