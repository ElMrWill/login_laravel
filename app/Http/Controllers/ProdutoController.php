<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->create();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth::check()) {
            return view('admin.crud.create');
        }

        return redirect('/admin/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nameFile = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $request->image->move('images', $nameFile);


            if (!$upload) {
                return redirect()->back()->with('erro', 'Erro ao enviar a imagem!')->withInput();
            }
            $data = $request->validate([
                'nome' => 'required',
                'valor' => 'required',
                'estoque' => 'required',
                'descricao' => 'required',
                'categoria' => 'required',
            ]);

            $data['image'] = $nameFile;

            $finaliza = Produto::create($data);
            return redirect('admin/dashboard')->with('success', 'Produto novo cadastrado!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (Auth::check()) {
            $item = Produto::findOrFail($id);
            return view('admin.crud.edit', compact('item'));
        }

        return redirect('/admin/login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nameFile = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $request->image->move('images', $nameFile);


            if (!$upload) {
                return redirect()->back()->with('erro', 'Erro ao enviar a imagem!')->withInput();
            }

            $data = $request->validate([
                'nome' => 'required',
                'valor' => 'required',
                'estoque' => 'required',
                'descricao' => 'required',
                'categoria' => 'required',
            ]);

            $data['image'] = $nameFile;

            $finaliza = Produto::whereId($id)->update($data);
            return redirect('admin/dashboard')->with('success', 'Produto novo cadastrado!');
        }
        $data = $request->validate([
            'nome' => 'required',
            'valor' => 'required',
            'estoque' => 'required',
            'descricao' => 'required',
            'categoria' => 'required',
        ]);

        $finaliza = Produto::whereId($id)->update($data);
        return redirect('admin/dashboard')->with('success', 'Produto novo cadastrado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produtosCase = Produto::findOrFail($id);
        $produtosCase->delete();
        return redirect('admin/dashboard')->with('sucess', 'Item removido com sucesso.');
    }
}
