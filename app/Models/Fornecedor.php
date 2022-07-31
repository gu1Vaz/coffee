<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Fornecedor extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name','email','password'];
    protected $guard = 'fornecedor';

    public function  vendas(){
        return $this->belongsToMany("App\Models\User","compras",'fornecedor_id','user_id')->withPivot([
                            'id',
                            'user_id',
                            'fornecedor_id',
                            'produtos'
                        ]);
    }

    public function  produtos(){
        return $this->hasMany("App\Models\Produto");
    }

}
