<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;
use Auth;

class ProdutoController extends Controller
{
    private $produtos;
    private $totalPage = 5;
    public function __construct( Produto $produto) {
         $this->produtos = $produto;
     }
    public function index()
    {
        $dados = $this->produtos::all()->where('avaliacao', 'best');
        return view('paginaInicial.paginaInicial',compact('dados'));
    }
    public function allCafes()
    {
        $allcafes = $this->produtos::all();
        return view('cafes.paginaCafes',compact('allcafes'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
      $url = $request->file("image")->store('public/imagesProdutos');
      $request->validate([
        'image'=>'required|mimes:jpg,jpeg,png,gif|max:2048',
        'notas'=>'required|max:255',
        'variedade'=>'required|max:255',
        'acidez'=>'required|max:25',
        'docura'=>'required|max:25',
        'produtor'=>'required|max:25',
        'origem'=>'required|max:255',
        'nome'=>'required|max:25',
        'preco'=>'required',
       ]);
      $produto = new Produto([
          "nome"=> $request->get('nome'),
          "image_url"=> $url,
          "notas"=> $request->get('notas'),
          "acidez"=> $request->get('acidez'),
          "docura"=> $request->get('docura'),
          "produtor"=> $request->get('produtor'),
          "origem"=> $request->get('origem'),
          "preco"=> $request->get('preco'),
          "variedade"=> $request->get('variedade'),
          "fornecedor_id"=> Auth::guard('fornecedor')->user()->id,
     ]);
     $produto->save();
     return redirect('/homeFornecedor')->with('success','Produto cadastrado com sucesso');
    }


    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return view('cafes.verProduto',compact('produto'));
    }


    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('Operacoes.edit',compact('produto'));
    }


    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        if($request->file("image") != null){
            $request->validate(['image'=>'required|mimes:jpg,jpeg,png,gif|max:2048']);
            $url = $request->file("image")->store('public/imagesProdutos');
            $produto->image_url = $url;
        }
        $produto->nome = $request->get('nome');
        $produto->variedade = $request->get('variedade');
        $produto->docura = $request->get('docura');
        $produto->acidez = $request->get('acidez');
        $produto->origem = $request->get('origem');
        $produto->produtor = $request->get('produtor');
        $produto->preco = $request->get('preco');
        $produto->notas = $request->get('notas');
        $produto->save();
        return redirect('/homeFornecedor')->with('success','Produto atualizado com sucesso');
    }


    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
       return redirect('/homeFornecedor')->with('success','Produto removido com sucesso');
    }
}
