<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "modalidade",
        "modelo",
        "placa",
        "renavam",
        "ano",
        "cambio",
        "preco",
        "combustivel",
        "condicao",
        "descricao",
        "imagem_path",
    ];

    public function getModalidade()
    {
         return $this->modalidade == 1 ? 'Aluguel' : 'Venda';
    }

    public function getModalidadeCliente()
    {
         return $this->modalidade == 1 ? 'Alugar' : 'Comprar';
    }
}
