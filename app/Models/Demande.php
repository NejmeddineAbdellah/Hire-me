<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $fillable=([
        'id',
        'lettre_motivation',
        'user_id',
        'id_annonce',
        'cv_candidat'

    ]);
    protected $hidden=([
        'created_at',
        'updated_at'
    ]);

}
