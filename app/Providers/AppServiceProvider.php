<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // <--- Importante
use Illuminate\Support\Facades\Auth; // <--- Importante
use App\Models\Cart;                 
use App\Models\Favorite;
use App\Models\Product;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {

        View::composer('*', function ($view) {
            

            $usuario = Auth::user();
            

            $carrinho = [];
            $favorito = [];
            $total = 0;


            if ($usuario) {

                $carrinho = $usuario->carts ?? collect([]);     
                $favorito = $usuario->favorites ?? collect([]); 


                $total = $carrinho->sum('price'); 
            }

            $produtos = Product::all(); 

            $view->with('produtos', $produtos);
            $view->with('usuario', $usuario);
            $view->with('carrinho', $carrinho);
            $view->with('favorito', $favorito);
            $view->with('total', $total);
        });
    }
}