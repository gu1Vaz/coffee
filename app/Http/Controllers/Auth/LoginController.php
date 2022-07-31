<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Fornecedor;
use Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:fornecedor')->except('logout');
    }
    public function showFornecedorLoginForm()
    {
        return view('auth.fornecedor_login');
    }

    public function loginFornecedor(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|min:5'
        ]);
        $email= $request->email;
        $password= $request->password;
        $remember= $request->remember;
        if (Auth::guard('fornecedor')->attempt(['email' => $email, 'password' => $password], $remember)) {
            return redirect()->intended(route('homeFornecedor'));
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
