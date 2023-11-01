<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convidado extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'idade',
        'CPF',
        'convuser_id'];

    // Relação com a reserva
    public function reserva() {
        return $this->belongsTo(Reserva::class, 'conv_user_id');
    }
}
