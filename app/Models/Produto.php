<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome','preco','desc','avaliacao','fornecedor_id','image_url','produtor','docura','acidez','varidedade','notas','origem'];

    public function  fornecedors(){
        return $this->belongsTo("App\Models\Fornecedor");
    }

}
