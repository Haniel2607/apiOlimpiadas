<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atletas extends Model

{
    use HasFactory;
    protected $primaryKey = 'idAtleta';
    
    protected $fillable = [
        'nomeAtleta',
        'nacionalidadeAtleta',
        'idadeAtleta',
    ];

    public function Medalhas()
    {
        return $this->hasMany(Medalhas::class, 'idAtleta');
    }
    
}
