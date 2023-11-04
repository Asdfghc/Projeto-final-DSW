<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $fillable = [
        'pacote1',
        'imagem1',
        'pacote2',
        'imagem2',
        'pacote3',
        'imagem3'];
}
