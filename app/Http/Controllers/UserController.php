<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Hash;


class UserController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function registro()
    {

        $numeroControle = rand(100000, 999999);
        return view('admin.registration', compact('numeroControle'));
    }

    public function registraUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'cod' => 'required|min:6',
            'nivel' => 'required'
        ]);


        $data = $request->all();
        $check = $this->create($data);

        return redirect()->intended('admin/login');
    }

    public function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'cod' => $data['cod'],
            'nivel' => $data['nivel'],
        ]);
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'cod' => 'required'
        ]);

        $credentials = $request->only('email', 'password', 'cod');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard')
                ->withSuccess('Você logou com sucesso!');
        }

        return redirect("admin/login")->withSuccess('Opa, acesso totalmente negado "mermão"!');
    }


    public function dashboard()
    {
        if (Auth::check()) {
            $produtoCases = Produto::all();
            return view('admin/dashboard', compact('produtoCases'));
        }

        return redirect('/admin/login');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/admin/login');
    }
}
