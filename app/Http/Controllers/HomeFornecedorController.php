<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeFornecedorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('fornecedor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produtos = Auth::guard('fornecedor')->user()->produtos;
        $vendas = Auth::guard('fornecedor')->user()->vendas;
        return view('homeFornecedor',compact('produtos','vendas'));
    }
}
