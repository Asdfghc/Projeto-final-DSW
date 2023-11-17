<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'dataehora_inicio',
        'dataehora_fim',
        'servico',
        'nconvidados',
        'idade',
        'status',
        'user_id'];

    // Relação com o usuário
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    // Relação com os convidados
    public function convidados() {
        return $this->hasMany(Convidado::class, 'convuser_id');
    }
}
