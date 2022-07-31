<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = ['fornecedor_id','user_id','produtos'];
    protected $casts = [
        'produtos' => 'array'
    ];
}
