<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;   
use App\Models\User;      
use App\Models\Cart;      
use App\Models\Favorite;  
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AethesaController extends Controller
{
    public function adicionarFavorito($id){

        $produto = Product::findOrFail($id);

        $jaExiste = Favorite::where('user_id', Auth::id())->where('product_id', $produto->id)->first();
        if (!$jaExiste){
            Favorite::create(['user_id' => Auth::id(), 'product_id' => $produto->id, 'name' => $produto->name, 'image' => $produto->image]);
        } else{
            $jaExiste->delete();
        }
    
        return back()->with('sucesso', 'Lista de desejos atualizada!');
    }

    public function adicionarCarrinho($id){

        $produto = Product::findOrFail($id);

        $jaExiste = Cart::where('user_id', Auth::id())->where('product_id', $produto->id)->first();
        if (!$jaExiste){
            Cart::create(['user_id' => Auth::id(), 'product_id' => $produto->id, 'name' => $produto->name, 'image' => $produto->image, 'price' => $produto->price]);
        } else{
            $jaExiste->delete();
        }
    
        return back()->with('sucesso', 'Carrinho atualizado!');
    }

    public function limparCarrinho(){
        Cart::where('user_id', Auth::id())->delete();

        return back()->with('sucesso', 'Carrinho limpo!');
    }
    public function limparFavorito(){
        Favorite::where('user_id', Auth::id())->delete();

        return back()->with('sucesso', 'Carrinho limpo!');
    }

    public function removerCarrinho($id){
        Cart::where('user_id', Auth::id())->where('product_id', $id)->delete();

        return back()->with('sucesso', 'Produto removido!');
    }

    public function removerFavorito($id){
        Favorite::where('user_id', Auth::id())->where('product_id', $id)->delete();

        return back()->with('sucesso', 'Produto desfavoritado!');
    }

    public function showLoginForm(){
        return view('login');
    }

    public function showRegistrationForm(){
        return view('register');
    }

    public function register(Request $request){
    $dadosValidados = $request->validate([
        'name'  => 'required',
        
        'email' => 'required|email|unique:users', 
        
        'password' => [
            'required',
            'min:6',
            'regex:/[0-9]/',
            'regex:/[^a-zA-Z0-9]/',
            'confirmed' 
        ],
    ], [
        'required' => 'Preencha todos os campos obrigatórios!',
        'email.email' => 'E-mail inválido!',
        'email.unique' => 'Este e-mail já está em uso. Tente fazer login.',
        'password.min' => 'A senha deve ter pelo menos 6 caracteres!',
        'password.regex' => 'A senha deve conter números e caracteres especiais!',
        'password.confirmed' => 'As senhas não conferem!'
    ]);

    $User = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    Auth::login($User);
    return redirect('/');
}
    
    public function login(Request $request){
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
