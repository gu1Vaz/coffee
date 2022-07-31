<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Fornecedor;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:fornecedor');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'cidade' => ['required', 'string', 'max:255'],
            'rua' => ['required', 'string', 'max:255'],
            'nrua' => ['required', 'integer'],
            'cep' => ['required', 'integer'],
        ]);
    }

    public function showFornecedorRegisterForm()
    {
        return view('auth.fornecedor_register');
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

            'cidade' => $data['cidade'],
            'rua' => $data['rua'],
            'nrua' => $data['nrua'],
            'cep' => $data['cep'],
        ]);
    }
    protected function createFornecedor(Request $request)
    {
        //$this->validator($request->all())->validate();
        Fornecedor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if (Auth::guard('fornecedor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('homeFornecedor'));
        }
    }

}
