<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Auth\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Produto;

class FrontendController extends Controller
{
    public function index()
    {
        $produtoPrincipal = Produto::where('categoria', 'cat01')->take(6)->get();
        return view('frontend.index', compact('produtoPrincipal'));
    }

    public function verifica()
    {
        if (Auth::check()) {
            $produtoCases = Produto::all();
            return view('admin/dashboard', compact('produtoCases'));
        }
        return redirect('frontend.index');
    }
}