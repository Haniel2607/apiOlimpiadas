<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medalhas extends Model
{
    use HasFactory;
    protected $primaryKey = 'idMedalha';
    
    protected $fillable = [
        'tipoMedalha',
        'modalidade',
        'idAtleta'
    ];
}
