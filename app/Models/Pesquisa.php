<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesquisa extends Model
{
    use HasFactory;

    protected $fillable = [
        'pergunta1',
        'pergunta2',
        'pergunta3',
        'pergunta4',
        'pergunta5',
        'pergunta6',
        'pergunta7',
        'pergunta8',

    ];
}
