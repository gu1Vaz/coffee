@extends('layouts.layout_navBar')

@section('content')
<head>
        <link href="{{ asset('css/pags/paginaCafes.css') }}" rel="stylesheet">
</head>
<body class="d-flex flex-column align-items-center">
      
<form class="w-75" method="POST" action="{{route('busca.update','-')}}" >
    @csrf
    @method('PUT')
    <div class="form-group d-flex flex-row p-3 w-100 barraBusca">
        <div class="input-group shadow-sm d-flex flex-row align-items-center">
            <input name="busca" id="busca" type="text" class="form-control card bg-white w-85 border-0"   placeholder="Digite aqui sua busca..." required value="{{old('busca')}}">
            <button type="submit" class="btn card bg-white border-0 w-5 d-flex flex-row align-items-center justify-content-center"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
<div class="d-flex flex-row">
    
    <div class="divcafes">

        @foreach($allcafes as $cafe)
            <a  href="{{ url('/verProduto/'.$cafe->id)}}" class="cafe ml-5 mr-5 ">
                <img class="img-produto"  src={{asset(Storage::url($cafe->image_url))}} ></img>
                <h5 class="">{{$cafe->nome}}</h5>
                <h6>A partir de R${{$cafe->preco}}</h6>
            </a>
        @endforeach
    </div>

</div>
</body>
@endsection
