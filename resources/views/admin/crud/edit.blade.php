@extends('layout')

@section('content')
    <div class="form-body">
        <div class="row justify-content-center">
            <div class="form-holder">
                <div class="form-content justify-content-left">
                    <div class="form-items">
                        <h3>@lang('Editar: ' . $item->nome . '.')</h3>
                        <p>Preencha os campos abaixo atentamente!</p>

                        <form class="requires-validation" action="{{ route('insere.altera', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <label for="nome" class="col-md-4 col-form-label text-md-right"></label>
                                <input class="form-control" type="text" name="nome" value="{{ $item->nome }}" id="nome" placeholder="Nome do produto" required>
                                <div class="valid-feedback">Nome do produto</div>
                                <div class="invalid-feedback">O nome do produto não pode ficar em branco!</div>
                            </div>

                            <div class="col-md-12">
                                <label for="valor" class="col-md-4 col-form-label text-md-right"></label>
                                <input class="form-control" type="text" name="valor" value="{{ $item->valor }}" id="valor" placeholder="R$ 0,00" required>
                                <div class="valid-feedback">Valor do produto</div>
                                <div class="invalid-feedback">O produto está sem preço!</div>
                            </div>

                            <div class="col-md-12">
                                <label for="estoque" class="col-md-4 col-form-label text-md-right"></label>
                                <input class="form-control" type="text" name="estoque" value="{{ $item->estoque }}" id="estoque" placeholder="Quantidade em estoque" required>
                                <div class="valid-feedback">Informe a quantidade em estoque</div>
                                <div class="invalid-feedback">O produto tem que ter uma quantidade!</div>
                            </div>

                            <div class="col-md-12">
                                <label for="descricao" class="col-md-4 col-form-label text-md-right"></label>
                                <textarea id="descricao" name="descricao" class="md-textarea form-control" placeholder="Descreva o produto em detalhes." rows="3">{{ $item->descricao }}</textarea>
                                <div class="valid-feedback">Descrição do produto</div>
                                <div class="invalid-feedback">Descreva o produto!</div>
                            </div>

                            <div class="col-md-12">
                                <label for="categoria" class="col-md-4 col-form-label text-md-right"></label>
                                <select name="categoria" class="form-select mt-3" required>
                                    <option value="cat01">Eletronicos</option>
                                    <option value="cat02">Veículos</option>
                                    <option value="cat03">Outros</option>
                                </select>
                                <div class="valid-feedback">Categoria selecionada!</div>
                                <div class="invalid-feedback">Informe a categoria do produto!</div>
                            </div>
                            <div class="col-md-12">
                                <label for="image" class="col-md-4 col-form-label text-md-right"></label>
                                <input type="file" name="image">
                            </div>
                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Alterar dados do produto</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
