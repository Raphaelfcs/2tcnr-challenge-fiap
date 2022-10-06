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
        "status",
    ];

    const STATUS = [
        0 => 'Pendente',
        1 => 'Aprovado',
        2 => 'Reprovado',
    ];

    const STATUS_CLASS = [
        0 => 'warning',
        1 => 'success',
        2 => 'primary',
    ];

    public function getStatus()
    {
        return self::STATUS[$this->status];
    }

    public function getStatusClass()
    {
        return self::STATUS_CLASS[$this->status];
    }

    public function getModalidade()
    {
         return $this->modalidade == 1 ? 'Aluguel' : 'Venda';
    }

    public function getModalidadeCliente()
    {
         return $this->modalidade == 1 ? 'Alugar' : 'Comprar';
    }
}
