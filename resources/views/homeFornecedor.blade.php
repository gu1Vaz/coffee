@extends('layouts.layout_navBar')

@section('content')
<head>
        <link href="{{ asset('css/pags/home.css') }}" rel="stylesheet">
</head>
<body >
<div class="Form">
        @if($errors->any())
           <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
        @endif
        @if(session()->get('success'))
            <div id="alerta"class="alertaSucesso alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif
    <button type="button" class="btn Botao card shadow-sm border-0" data-toggle="modal" data-target="#vender">
         <img  src="{{ URL::to('/') }}/imgs/dollar.png"   >
         <h5>Vender</h5>
    </button>
    <button type="button" class="btn Botao card shadow-sm border-0" data-toggle="modal" data-target="#vendas">
         <img  src="{{ URL::to('/') }}/imgs/entrega.png" >
         <h5>Minhas Vendas</h5>
    </button>
    <button type="button" class="btn Botao card shadow-sm border-0" data-toggle="modal" data-target="#produtos">
        <img  src="{{ URL::to('/') }}/imgs/interest.png"   >
        <h5>Meus Produtos</h5>
        </button>
    <div class="modal fade" id="vendas" tabindex="-1" aria-labelledby="vendas" aria-hidden="true">
            <div class="DivDialog modal-dialog">
                <div class="DivContent modal-content">
                    <div class="d-flex flex-column justify-between h-25 modal-header border-0 pl-5 pt-4">
                           <h4>Minhas Vendas</h4>
                           <h5>Vendas Pendentes:[{{count($vendas)}}]</h5>
                    </div>
                    <div class="DivBody modal-body">
                    <div class="card w-90 h-70 mt-4">
                          <ul class="list-group list-group-flush w-100  overflow-auto ">
                           @foreach($vendas as $item)
                                            <li class="divItem list-group-item p-2 m-1 ">
                                                <strong>
                                                {{json_decode($item["pivot"]["produtos"])->produto_qtd}}
                                                {{json_decode($item["pivot"]["produtos"])->produto_nome}}
                                                enviar a
                                                {{$item->name}}
                                                </strong>       
                                                <div class="d-flex flex-row justify-content-end w-25">
                                                    <button class="btn btn-dark mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Info Destino
                                                    </button>
                                                    <div class="bg-dark dropdown-menu z-index  dropdown-menu-right p-2">
                                                            <strong class="text-light">Cidade:</strong>
                                                            <span class="text-light">{{$item->cidade}}</span>
                                                            <strong class="text-light">Rua:</strong>
                                                            <span class="text-light">{{$item->rua}}</span>
                                                            <strong class="text-light">N°</strong>
                                                            <span class="text-light">{{$item->nrua}}</span>
                                                            <strong class="text-light">Cep:</strong>
                                                            <span class="text-light">{{$item->cep}}</span>
                                                    </div>
                                                    <form method="POST"
                                                        action="{{route('venda.destroy',$item['pivot']->id)}}"
                                                        onsubmit="if( !confirm('Tem certeza?') ){return false;}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-success " type="submit">Marcar Enviado</button>
                                                    </form>
                                                    
                                                </div>     
                                            </li>
                                        @endforeach
                          </ul>
                    </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="modal fade" id="produtos" tabindex="-1" aria-labelledby="produtos" aria-hidden="true">
            <div class="DivDialog modal-dialog">
                <div class="DivContent modal-content">
                    <div class="modal-header  border-0 pl-5 pt-4 ">
                           <h4>Meus Produtos</h4>
                    </div>
                    <div class="DivBody modal-body">
                        <div class="card w-90 h-65 mt-4">
                            <ul class="list-group list-group-flush w-100  overflow-auto" style="height: 700px;">
                                    @foreach($produtos as $item)
                                            <li class="divItem list-group-item p-2 m-1 ">
                                                <img class="img-thumbnail rounded-circle"  src={{asset(Storage::url($item->image_url))}} ></img>
                                                <span>{{$item->nome}}</span>
                                                <span>{{$item->variedade}}</span>
                                                <span>Doçura {{$item->docura}}</span>
                                                <span>Acidez {{$item->acidez}}</span>
                                                <h4 class="d-flex flex-row">
                                                    <a class="btn btn-primary mr-2" href="{{route('produto.edit',$item->id)}}"><i class="icon fa fa-pencil"></i></a>
                                                    <form method="POST"
                                                        action="{{route('produto.destroy',$item->id)}}"
                                                        onsubmit="if( !confirm('Tem certeza?') ){return false;}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn btn-danger" type="submit" ><i class="icon  fa fa-trash"></i></button>
                                                    </form>
                                                </h4>
                                            </li>
                                        @endforeach
                                    </ul>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="modal fade" id="vender" tabindex="-1" aria-labelledby="vender" aria-hidden="true">
            <div class="DivDialog modal-dialog">
                <div class="DivContent modal-content">
                    <div class="modal-header  border-0 pl-5 pt-4 ">
                           <h4>Cadastrar Novo Produto</h4>
                    </div>
                    <div class="DivBody modal-body p-0 display-flex flex-row align-items-start">
                        <div class="card  d-flex flex-row justify-content-center overflow-auto">
                            <form class="w-80 h-100" method="POST" enctype="multipart/form-data"  action="{{route('produto.store')}}" >
                                @csrf
                                @method('POST')
                                <div class="mt-2 nput-group  d-flex flex-row align-items-center w-100 h-100">
                                    <div class=" d-flex flex-column">
                                        <div class="d-flex flex-row w-100 mb-2">
                                            <label class="w-25 text-md-right mr-2" for="nome"> Nome:</label>
                                            <input class="w-75 form-control"type="text" name="nome" id="nome">
                                        </div>
                                        <div class="d-flex flex-row w-100 mb-2">
                                            <label class="w-25 text-md-right mr-2" for="origrm"> Origem:</label>
                                            <input class="w-75 form-control"type="text" name="origem" id="origem">
                                        </div>
                                        <div class="d-flex flex-row w-100 mb-2">
                                            <label class="w-25 text-md-right mr-2" for="nome"> Produtor:</label>
                                            <input class="w-75 form-control"type="text" name="produtor" id="produtor">
                                        </div>
                                        <div class="d-flex flex-row w-100 mb-2">
                                            <label class="w-25 text-md-right mr-2" for="nome"> Doçura:</label>
                                            <select class="w-75 form-control"type="text" name="docura" id="docura">
                                                 <option value="baixa">Baixa</option>
                                                 <option value="media">Media</option>
                                                 <option value="alta">Alta</option>
                                            </select>
                                        </div>
                                        <div class="d-flex flex-row w-100 mb-2">
                                            <label class="w-25 text-md-right mr-2" for="nome"> Acidez:</label>
                                            <select class="w-75 form-control"type="text" name="acidez" id="acidez">
                                                 <option value="citrica">Citrica</option>
                                                 <option value="malica">Malica</option>
                                                 <option value="latica">Latica</option>
                                                 <option value="fosforica">Fosforica</option>
                                                 <option value="acetica">Acetica</option>
                                             </select>
                                        </div>
                                        <div class="d-flex flex-row w-100 mb-2">
                                            <label class="w-25 text-md-right mr-2" for="nome"> Variedade:</label>
                                            <select class="w-75 form-control"type="text" name="variedade" id="variedade">
                                                 <option value="Bourbon Amarelo">Bourbon Amarelo</option>
                                                 <option value="Bourbon Vermelho">Bourbon Vermelho</option>
                                                 <option value="Catuaí Vermelho">Catuaí Vermelho</option>
                                                 <option value="Catuaí Amarelo">Catuaí Amarelo</option>
                                                 <option value="Mundo Novo">Mundo Novo</option>
                                                 <option value="Caturra">Caturra</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" d-flex flex-column align-items-end" >
                                        <div class="d-flex flex-row w-100 mb-2 h-50">
                                            <label class="w-25 text-md-right mr-2" for="notas"> Notas:</label>
                                            <textarea class="w-75 form-control"type="text" name="notas" id="notas"></textarea>
                                        </div>

                                        <div class="d-flex flex-row w-100 mb-2 h-10">
                                            <label class="w-25 text-md-right mr-2 " for="image"> Imagem:</label>
                                            <input  class="w-75 form-control" type="file" name="image" id="image">
                                        </div>
                                        <div class="d-flex flex-row w-100 mb-2 h-10">
                                            <label class="w-25 text-md-right mr-2" for="preco"> Preço (R$):</label>
                                            <input class="w-75 form-control" type="text" name="preco" id="preco">
                                        </div>
                                        <button type="submit" class="btn w-75  card  mt-2 text-light border-0  d-flex flex-row align-items-center p-3 justify-content-center necro">Anunciar</button>
                                     </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</body>
@endsection

