@extends('layouts.layout_navBar')

@section('content')

<head>
        <link href="{{ asset('css/pags/verProduto.css') }}" rel="stylesheet">
</head>
<body class="d-flex flex-column align-items-center">
    <div class="divView">
        <div class="divImg">
           <img class="imagem"  src={{asset(Storage::url($produto->image_url))}} ></img>
        </div>
        <div class="divCompra">
            <h2>{{$produto->nome}}</h2>
            <h6 class="mb-3">{{$produto->produtor}}</h6>
            <form class="d-flex flex-column align-items-center w-100" method="POST" action="{{route('compra.store')}}" >
                 @csrf
                 @method('POST')
                 <input class="d-none"  id="idP" name="idP" value={{$produto->id}} />
                 <div class="d-none" id="nameP" name="nameP" >{{$produto->nome}}</div>
                 <div class="d-none" id="imageP" name="imageP" >{{$produto->image_url}}</div>
                 <input class="d-none" id="precoP" name="precoP" value={{$produto->preco}} /> 
                 <div class="d-flex flex-row justify-content-center w-100">
                     <label for="qtd">Quantidade</label>
                     <input class="mb-3" type="number" id="qtd" name="qtd" value="1"/>
                 </div>
                 <h4 class="mb-3">R${{$produto->preco}} cada </h4>
                 <div>
                    <button type="submit" class="btn text-light necro">Comprar </button>
                    <button  id="add_cart" class="btn btn-success text-light ">  
                      <i class="fa fa-shopping-cart"></i>
                    </button>
                 </div>
                 
            </form>
        </div>
    </div>
    <div class="divDeco"></div>
    <div class="divDados mt-4 mb-3">
        <div class="divAnalise">
            <h3>Análise Sensorial</h3>
             <div class="d-flex flex-row mt-3 ">
                 <h5 class="font-weight-bold">Doçura:</h5>
                 <h5 class="ml-1">{{$produto->docura}}</h5>
             </div>
             <div class="d-flex flex-row mb-2">
                 <h5 class="font-weight-bold">Acidez:</h5>
                 <h5 class="ml-1">{{$produto->acidez}}</h5>
             </div>
            <h6>{{$produto->notas}}</h6>
        </div>
        <div class="divDetalhamento">
            <h3 >Detalhamento</h3>
            <div class="d-flex flex-row mt-3">
                 <h5 class="font-weight-bold">Variedade:</h5>
                 <h5 class="ml-1"> {{$produto->variedade}}</h5>
                 <h5 class="ml-5 font-weight-bold">Origem:</h5>
                 <h5 class="ml-1"> {{$produto->origem}}</h5>
             </div>
             <div class="d-flex flex-row">
                 <h5 class="font-weight-bold">Produtor:</h5>
                 <h5 class="ml-1"> {{$produto->produtor}}</h5>
                 <h5 class="ml-5 font-weight-bold" >Preço(Unidade):</h5>
                 <h5 class="ml-1"> {{$produto->preco}}R$</h5>
            </div>
        </div>
    </div>
    <div class="Rodape">
                <img src="../imgs/rodape.png" alt="">
                 <div class="d-flex flex-column ml-4 mr-4">
                        <h4>Cadastre seu e-mail e receba promoções</h4>
                        <h4>e novidades exclusivas da Lumus Coffe</h4>
                 </div>
                 <div class="input-group w-25 input-group-lg">
                    <input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                    <button type="submit"  style="background:#605B5B;" class="btn text-light btn-lg">
                                    {{ __('Enviar') }}
                    </button>
                 </div>
            </div>
</body>
@endsection
