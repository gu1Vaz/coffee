@extends('layouts.layout_navBar')
@section('content')
<head>
       <link href="{{ asset('css/pags/paginaInicial.css') }}" rel="stylesheet">
</head>
<body id ="body" >
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
        <div class="Conteudo container">
            <div class="JanelaPromocao mt-3 w-100">
                <div class="ItensJanela">
                    <div onclick="troca_banner()" class="BotaoCorrer"  >
                      <i class="fa fa-angle-left"></i>
                    </div>
                    <div  id="divBanner" class="Promocao" >
                           
                    </div>
                    <div onclick="troca_banner()" class="BotaoCorrer"   >
                       <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>

            <h5 class="mt-3 mb-3">Mais Vendidos</h5>
            <div class="d-flex flex-row justify-content-between card shadow-sm w-100 p-5">

             @foreach($dados as $item)
                <a  href="{{ url('/verProduto/'.$item->id)}}" class="text-secondary d-flex flex-column  h-100 w-25 align-items-center justify-content-center m-2   ">
                        <img style="width:126px;height:92px;" src={{asset(Storage::url($item->image_url))}} />
                        <h5 class="font-weight-bold"> {{$item->nome}}</h5>
                        <h5 > {{$item->tipo}}</h5>
                </a>
             @endforeach

            </div>
            <img class="mt-5" src="imgs/div.png" alt="">
            <div class="Sobre">
                 <div class="Imagem">
                     <img src="imgs/sobre.png" alt="">
                 </div>
                 <div class="Texto p-3">
                    <h4 class="mb-3">Quem somos? </h4>
                    <h5>Somos uma empresa que realiza revenda de</h5>
                    <h5>café com rapidez e qualidade máxima para</h5>
                    <h5>todo Brasil. Somente em nosso site você</h5>
                    <h5>pequeno produtor consegue vender seu</h5>
                    <h5>próprio produto, basta realizar seu cadastro</h5>
                    <h5>como fornecedor</h5>
                    <a href="/register" style="background:#212121;border-radius:0;" class="mt-3 btn text-light btn-lg">
                                    {{ __('Realizar Cadastro') }}
                    </a>
                </div>
            </div>
            <img class="mt-5" src="imgs/div.png" alt="">
            <div class="Sobre">
                 <div class="Imagem">
                     <img src="imgs/sobre2.png" alt="">
                 </div>
                 <div class="Texto p-3">
                    <h4 class="mb-3">O que nosso site traz a você? </h4>
                    <h5>Em nosso site você encontra todos os tipos de café do mais</h5>
                    <h5>amargo até o mais suave</h5>
                    <h5>Confira todos nossos produtos</h5>
                    <a href="/cafes"  style="background:#212121;border-radius:0;" class="mt-3 btn text-light btn-lg">
                                    {{ __('Confira nossas ofertas especiais') }}
                    </a>
                </div>
            </div>

            <div class="Rodape p-5">
                <img src="imgs/rodape.png" alt="">
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

        <div class="Pagamentos p-5">
               <div class="d-flex flex-column ">
                   <img style="width:701px;height:49px;" src="imgs/pagamentos.png" alt="">
                   <img style="width:231px;height:104px;"src="imgs/premios.png" alt="">
               </div>
               <img style="margin-left:30%"src="imgs/safe.png" alt="">
        </div>
</div>
<script src="{{ url('/js/banners.js') }}"></script>
</body>
@endsection

