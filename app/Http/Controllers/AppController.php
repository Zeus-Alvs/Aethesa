<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;   
use App\Models\User;      
use App\Models\Cart;      
use App\Models\Favorite;  
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function index(){
        $novidades = Product::orderby('created_at', 'desc')->take(6)->get();

        $destaques = Product::orderBy('sold_count', 'desc')->take(4)->get();
        
        $usuario = Auth::user();

        $total = 0;
        return view('home', [
            'novidades' => $novidades,
            'destaques' => $destaques,
            'usuario' => $usuario,
            'total' => $total
        ]);
    }
}
