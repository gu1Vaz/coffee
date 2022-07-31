@extends('layouts.layout_navBar')
@section('content')
<head>
    <link href="{{ asset('css/pags/busca.css') }}" rel="stylesheet">
</head>
<body id="body" >
    <div class="divGeral d-flex flex-column align-items-center">
    <form class="w-75 mt-3" method="POST" action="{{route('busca.update','-')}}" >
        @csrf
        @method('PUT')
        <div class="form-group d-flex flex-row p-3 w-100 barraBusca">
            <div class="input-group shadow-sm d-flex flex-row align-items-center">
                <input name="busca" id="busca" type="text" class="form-control card bg-white w-85 border-0"   placeholder="Digite aqui sua busca..." required value="{{old('busca')}}">
                <button type="submit" class="btn card bg-white border-0 w-5 d-flex flex-row align-items-center justify-content-center"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
    <div class="d-flex flex-row w-100 p-2">
         <h6>Resultados da busca:</h6>
      </div>
      <div style="margin-top:1px;margin-bottom:5px;margin-left:6px;border-top:1px solid #F2F3F2;width:100%"></div>
      <div class="accordion w-100" id="filtro">
        <div>
            <div class="filtroView rounded-0 w-25" id="headingTwo">
                <h6 class="mb-0">
                <button class="colapsed btn d-flex flex-row align-items-center" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <img style="width:26px;height:26px;margin-right:6px;" src="{{ URL::to('/') }}/imgs/options.png" alt=""></img>
                    <h6>Filtro</h6>
                </button>
                </h6>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#filtro">
                <div class="filtroOpcoes rounded-0 card-body pl-5">
                     <div >
                     <form class="d-flex flex-row justify-content-start "  method="POST" action="{{route('busca.update',$busca)}}" >
                                @csrf
                                @method('PUT')
                        <div class="d-flex flex-column mr-5">
                            <h6>Variedade</h6>
                            <div style="margin-top:3px;margin-bottom:5px;border-top:1px solid #737373;width:100%;"></div>
                                <div class="d-flex flex-column form-check form-check-inline"  >
                                    <div><input class="form-check-input" type="radio" name="variedade" id="variedade" value="Bourbon Amarelo"><span>Bourbon Amarelo</span></div>
                                    <div><input class="form-check-input" type="radio" name="variedade" id="variedade" value="Bourbon Vermelho"><span>Bourbon Vermelho</span></div>
                                    <div><input class="form-check-input" type="radio" name="variedade" id="variedade" value="Catuaí Amarelo"><span>Catuaí Amarelo</span></div>
                                    <div><input class="form-check-input" type="radio" name="variedade" id="variedade" value="Catuaí Vermelho"><span>Catuaí Vermelho</span></div>
                                    <div><input class="form-check-input" type="radio" name="variedade" id="variedade" value="Mundo Novo"><span>Mundo Novo</span></div>
                                    <div><input class="form-check-input" type="radio" name="variedade" id="variedade" value="Caturra"><span>Caturra</span></div>
                                </div>

                         </div>
                         <div class="d-flex flex-column mr-5">
                            <h6 >Doçura</h6>
                            <div style="margin-top:3px;margin-bottom:5px;border-top:1px solid #737373;width:100%;"></div>
                                <div class="d-flex flex-column form-check form-check-inline"  >
                                    <div><input class="form-check-input" type="radio" name="docura" id="docura" value="alta"><span>Alta</span></div>
                                    <div><input class="form-check-input" type="radio" name="docura" id="docura" value="media"><span>Media</span></div>
                                    <div><input class="form-check-input" type="radio" name="docura" id="docura" value="baixa"><span>Baixa</span></div>
                                </div>
                         </div>
                         <div class="d-flex flex-column mr-5">
                            <h6>Acidez</h6>
                            <div style="margin-top:3px;margin-bottom:5px;border-top:1px solid #737373;width:100%;"></div>
                                <div class="d-flex flex-column form-check form-check-inline"  >
                                    <div><input class="form-check-input" type="radio" name="acidez" id="acidez" value="citrica"><span>Citrica</span></div>
                                    <div><input class="form-check-input" type="radio" name="acidez" id="acidez" value="malica"><span>Malica</span></div>
                                    <div><input class="form-check-input" type="radio" name="acidez" id="acidez" value="fosforica"><span>Fosforica</span></div>
                                    <div><input class="form-check-input" type="radio" name="acidez" id="acidez" value="acetica"><span>Acetica</span></div>
                                    <div><input class="form-check-input" type="radio" name="acidez" id="acidez" value="latica"><span>Latica</span></div>
                                </div>
                         </div>
                          <button type="submit" class="h-25 btn card bg-primary border-0 w-15 text-light">Aplicar mudanças</button>
                       </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column w-100 justify-content-center align-items-center">
        <ul class="list-group list-group-flush w-75">
        @foreach($result as $item)
          <a  class="divItem list-group-item" style="text-decoration:none;" href="{{ url('/verProduto/'.$item->id)}}"  >
                <img class="child img-thumbnail rounded-circle" src={{asset(Storage::url($item->image_url))}} ></img>
                <h6  class="child" >{{$item->nome}}</h6>
                <h6  class="child">R${{$item->preco}}</h6>
                <h6  class="child">{{$item->variedade}}</h6>
                <h6  class="child">{{$item->origem}}</h6>
                <h6  class="child">Doçura {{$item->docura}}</h6>
                <h6  class="child">Acidez {{$item->acidez}}</h6>
          </a>
        @endforeach
        </ul>
    </div>
    </div>
</body>
@endsection
