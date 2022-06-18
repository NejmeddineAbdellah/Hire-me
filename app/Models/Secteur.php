<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    use HasFactory;

    protected $fillable=([
        'id',   
        'titre_secteur'

    ]);   
    protected $hidden=([
        'created_at',
        'updated_at'
    ]); 

    public function users(){
        return $this->hasMany(User::class,'secteur_id','id');
    }
    
}
