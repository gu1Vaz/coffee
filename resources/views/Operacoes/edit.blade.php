<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body  style="padding:12px 12px 0 12px;">
<h4 class="mb-3">Editar {{$produto->nome}}:</h4>
<form class="w-75 h-100" enctype="multipart/form-data" method="POST" action="{{route('produto.update',$produto->id)}}" >
    @csrf
    @method('PUT')
    <div class="input-group  d-flex flex-column align-items-center w-100 h-100">
        <div class="d-flex flex-row w-100 mb-2">
            <label class=" text-md-right mr-2" for="nome"> Nome:</label>
            <input class="w-75 form-control" value="{{$produto->nome}}"type="text" name="nome" id="nome">
        </div>
        <div class="d-flex flex-row w-100 mb-2">
            <label class=" text-md-right mr-2 " for="image_url"> Imagem:</label>
            <img style="width:50px;height:50px;"class="img-thumbnail rounded-circle"  src={{asset(Storage::url($produto->image_url))}} ></img>
            <input class="w-75 form-control"  type="file" name="image" id="image">
        </div>
        <div class="d-flex flex-row w-100 mb-2">
            <label class=" text-md-right mr-2 " for="variedade"> Variedade:</label>
            <div class="d-flex flex-row form-check form-check-inline"  >
                <div><input class="form-check-input" type="radio" name="variedade" id="variedade" value="Bourbon Amarelo" checked><span>Bourbon Amarelo</span></div>
                <div><input class="form-check-input" type="radio" name="variedade" id="variedade" value="Bourbon Vermelho"><span>Bourbon Vermelho</span></div>
                <div><input class="form-check-input" type="radio" name="variedade" id="variedade" value="Catuaí Amarelo"><span>Catuaí Amarelo</span></div>
                <div><input class="form-check-input" type="radio" name="variedade" id="variedade" value="Catuaí Vermelho"><span>Catuaí Vermelho</span></div>
                <div><input class="form-check-input" type="radio" name="variedade" id="variedade" value="Mundo Novo"><span>Mundo Novo</span></div>
                <div><input class="form-check-input" type="radio" name="variedade" id="variedade" value="Caturra"><span>Caturra</span></div>
            </div>
        </div>
        <div class="d-flex flex-row w-100 mb-2">
            <label class=" text-md-right mr-2 " for="docura"> Doçura:</label>
            <div class="d-flex flex-row form-check form-check-inline"  >
                 <div><input class="form-check-input" type="radio" name="docura" id="docura" value="alta" checked><span>Alta</span></div>
                 <div><input class="form-check-input" type="radio" name="docura" id="docura" value="media"><span>Media</span></div>
                 <div><input class="form-check-input" type="radio" name="docura" id="docura" value="baixa"><span>Baixa</span></div>
            </div>
        </div>
        <div class="d-flex flex-row w-100 mb-2">
            <label class=" text-md-right mr-2 " for="acidez"> Acidez:</label>
            <div class="d-flex flex-row form-check form-check-inline"  >
                <div><input class="form-check-input" type="radio" name="acidez" id="acidez" value="citrica" checked><span>Citrica</span></div>
                <div><input class="form-check-input" type="radio" name="acidez" id="acidez" value="malica"><span>Malica</span></div>
                <div><input class="form-check-input" type="radio" name="acidez" id="acidez" value="fosforica"><span>Fosforica</span></div>
                <div><input class="form-check-input" type="radio" name="acidez" id="acidez" value="acetica"><span>Acetica</span></div>
                <div><input class="form-check-input" type="radio" name="acidez" id="acidez" value="latica"><span>Latica</span></div>
            </div>
        </div>
        <div class="d-flex flex-row w-100 mb-2">
            <label class=" text-md-right mr-2" for="nome"> Origem:</label>
            <input class="w-75 form-control" value="{{$produto->origem}}"type="text" name="origem" id="origem">
        </div>
        <div class="d-flex flex-row w-100 mb-2">
            <label class=" text-md-right mr-2" for="nome"> Produtor:</label>
            <input class="w-75 form-control" value="{{$produto->produtor}}"type="text" name="produtor" id="produtor">
        </div>
        <div class="d-flex flex-row w-100 mb-2">
            <label class=" text-md-right mr-2" for="nome"> Preço(R$):</label>
            <input class="w-75 form-control" value="{{$produto->preco}}" type="number" name="preco" id="preco">
        </div>
        <div class="d-flex flex-row w-100 mb-2">
            <label class=" text-md-right mr-2" for="nome"> Notas:</label>
            <textarea class="w-75 form-control"  rows="4" cols="50" type="text" name="notas" id="notas">{{$produto->notas}}</textarea>
        </div>
        <button type="submit" class="btn card bg-primary  mt-2 text-light border-0 w-5 d-flex flex-row align-items-center justify-content-center">Atualizar</button>
    </div>
</form>

</body>
</html>
