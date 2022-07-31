@extends('layouts.layout_auths')

@section('content')
<div class="container">
  <form method="POST" action="{{ route('register') }}">
   @csrf
  <div class="d-flex flex-row h-100 w-100">
    <div class="d-flex flex-column h-100 w-100">
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme sua Senha') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
    </div>
    <div class="d-flex flex-column h-100 w-100 border-left">
       <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>

            <div class="col-md-6">
                <input id="cidade" type="text" class="form-control @error('name') is-invalid @enderror" name="cidade" value="{{ old('cidade') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Endereço') }}</label>

            <div class="col-md-6">
                <input id="rua" type="text" class="form-control @error('name') is-invalid @enderror" name="rua" value="{{ old('rua') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Numero') }}</label>

            <div class="col-md-6">
                <input id="nrua" type="number" class="form-control @error('name') is-invalid @enderror" name="nrua" value="{{ old('nrua') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('CEP') }}</label>

            <div class="col-md-6">
                <input id="cep" type="number" class="form-control @error('name') is-invalid @enderror" name="cep" value="{{ old('cep') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
         
    </div>               
 </div>
 <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            @if (Route::has('password.request'))
                <a    style="color: #b3b3ff;" class="btn btn-link" href="{{ route('login') }}">
                    {{ __('Já tem uma conta?') }}
                </a>
            @endif
            <button type="submit"  style="background:#212121;border-radius:0;" class="btn text-light btn-lg">
                {{ __('Cadastrar') }}
            </button>
          </div>
     </div>
    </form>
</div>
@endsection
