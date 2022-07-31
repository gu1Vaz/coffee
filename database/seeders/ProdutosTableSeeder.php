<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::create(
            ['nome'=>'Nescafé Origens','image_url'=>'public/imagesProdutos/1pvfokegUcCTxqsqKglig3Fu78OLqtRh8nsVIGB7.jpeg','preco'=>'5','avaliacao'=>'best','fornecedor_id'=>'1','docura'=>'alta','acidez'=>'malica','variedade'=>'Bourbon Amarelo','notas'=>'du bao','origem'=>'India','produtor'=>'Tupã']
        );
        Produto::create(
            ['nome'=>'Café Caboclo','image_url'=>'public/imagesProdutos/iUFhdYJdwY2llWEimgXgj9DoePAw21ZMj51hz8Tf.jpeg','preco'=>'5','avaliacao'=>'best','fornecedor_id'=>'1','docura'=>'alta','acidez'=>'malica','variedade'=>'Bourbon Amarelo','notas'=>'du bao','origem'=>'India','produtor'=>'Tupã']
        );
        Produto::create(
            ['nome'=>'Café Santa Mônica','image_url'=>'public/imagesProdutos/omKsKqCZxnDBZxb7Swk6eCMsjeYbq7WD5rG5mtPS.jpeg','preco'=>'5','avaliacao'=>'best','fornecedor_id'=>'1','docura'=>'alta','acidez'=>'malica','variedade'=>'Bourbon Amarelo','notas'=>'du bao','origem'=>'India','produtor'=>'Tupã']
        );
        Produto::create(
            ['nome'=>'Canastra Moído','image_url'=>'public/imagesProdutos/RypcKvxZAYjrakRQA49pZivFBXMmxSyUdBOc4dfK.jpeg','preco'=>'5','avaliacao'=>'best','fornecedor_id'=>'1','docura'=>'alta','acidez'=>'malica','variedade'=>'Bourbon Amarelo','notas'=>'du bao','origem'=>'India','produtor'=>'Tupã']
        );
        Produto::create(
            ['nome'=>'Starbucks','image_url'=>'public/imagesProdutos/kDmodjOKPrZu4l1YxJS9hAnCx277bPJdJvqLWXiN.jpeg','preco'=>'5','avaliacao'=>'comum','fornecedor_id'=>'1','docura'=>'alta','acidez'=>'malica','variedade'=>'Bourbon Amarelo','notas'=>'du bao','origem'=>'India','produtor'=>'Tupã']
        );
        Produto::create(
            ['nome'=>'Café Qualita','image_url'=>'public/imagesProdutos/3xdInu5aIgJKCNDAOhuLH9tdPJURwMplwnd335fR.jpeg','preco'=>'5','avaliacao'=>'comum','fornecedor_id'=>'1','docura'=>'alta','acidez'=>'malica','variedade'=>'Bourbon Amarelo','notas'=>'du bao','origem'=>'India','produtor'=>'Tupã']
        );
    }
}
