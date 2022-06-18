<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruteur extends Model
{
    use HasFactory;

    protected $fillable=([
        'name',
        'logo',
        'user_id'
    ]);
    protected $hidden=([
        'created_at',
        'updated_at'
    ]);

    public function users(){
        return $this->belongsTo(User::class);
    }


}
