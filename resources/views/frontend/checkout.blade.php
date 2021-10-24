    @extends('frontend.layout')

    @section('title')
        WF Store | Finalização.
    @endsection


    @section('content')
        <div class="content">
            <div class="container-fluid">
                <x-alert />
            </div>
        </div>
        <div class="content">
            <div class="data">
                <div class="data__cliente">
                    <h1>Confirme os seus dados: </h1>
                        <form class="requires-validation" action="{{ route('carrinho.finaliza') }}" method="POST">
                            @csrf
                            <p>Dados do cartão: </p>
                                <div class="data__fields">
                                    <label for="numeroCard" class="data_label">Número do cartão:</label>
                                    <input class="data__input" type="number" name="numeroCard" id="numeroCard" placeholder="123456789101" required>
                                </div>
                                <div class="data__fields">
                                    <label for="bandeiraCard" class="data_label">Bandeira do cartão:</label>
                                    <input class="data__input" type="text" name="bandeiraCard" id="bandeiraCard" placeholder="Visa, Mastercard, Elo" required>
                                </div>
                                <div class="data__fields">
                                    <label for="expiraCard" class="data_label">Vencimento:</label>
                                    <input class="data__input" type="number" name="expiraCard"  id="expiraCard" placeholder="99" maxlength="2" style="margin-bottom: 5px;" required>
                                    <label for="expiraCardAno" class="data_label"></label>
                                    <input class="data__input" type="number" name="expiraCardAno"  id="expiraCardAno" placeholder="9999" maxlength="4" required>
                                </div>
                                <div class="data__fields">
                                    <label for="cvv" class="data_label">Código de Segurança</label>
                                    <input class="data__input" type="number" name="cvv"  id="cvv" placeholder="12345" maxlength="5" required>
                                </div>
                            <p>Confirme os seus dados: </p>
                                <div class="data__fields">
                                    <label for="nome" class="data_label">Nome inteiro:</label>
                                    <input class="data__input" type="text" name="nome" id="nome" value="{{Auth::user()->name}}" placeholder="Nome do comprador" required>
                                </div>

                                <div class="data__fields">
                                    <label for="cpf" class="data_label">CPF ou CNPJ:</label>
                                    <input class="data__input" type="text" name="cpf" value="{{Auth::user()->cpf}}" id="cpf" placeholder="123.456.789-10" required>
                                </div>

                                <div class="data__fields">
                                    <label for="ddd" class="data_label">DDD</label>
                                    <input class="data__input" type="text" name="ddd" value="{{Auth::user()->ddd}}" id="ddd" placeholder="11" maxlength="2" required>
                                </div>
                                <div class="data__fields">
                                    <label for="phone_number" class="data_label">Seu telefone:</label>
                                    <input class="data__input" type="text" name="phone_number" id="phone_number" value="{{Auth::user()->tel}}" placeholder="91234-5678" required>
                                </div>

                                <div class="data__fields">
                                    <label for="email" class="data_label">Seu e-mail:</label>
                                    <input class="data__input" type="text" name="email" value="{{Auth::user()->email}}" style="text-transform: lowercase" id="email" placeholder="email@email.com" required>
                                </div>
                            <p>Dados de localização: </p>
                                <div class="data__fields">
                                    <label for="rua" class="data_label">Endereço</label>
                                    <input class="data__input" type="text" name="rua" value="{{Auth::user()->rua}}" id="rua" placeholder="Rua Tals" required>
                                </div>
                                <div class="data__fields">
                                    <label for="numero" class="data_label">Número da casa:</label>
                                    <input class="data__input" type="text" name="numero" id="numero" value="{{Auth::user()->numero}}" placeholder="123" required>
                                </div>

                                <div class="data__fields">
                                    <label for="complemento" class="data_label">Complemento:</label>
                                    <input class="data__input" type="text" name="complemento" value="{{Auth::user()->complemento}}" id="complemento" placeholder="CASA" required>
                                </div>
                                <div class="data__fields">
                                    <label for="bairro" class="data_label">Bairro:</label>
                                    <input class="data__input" type="text" name="bairro" value="{{Auth::user()->bairro}}" id="bairro" placeholder="Nome do bairro" required>
                                </div>
                                <div class="data__fields">
                                    <label for="cep" class="data_label">CEP:</label>
                                    <input class="data__input" type="text" name="cep" id="cep" value="{{Auth::user()->cep}}" placeholder="CEP" required>
                                </div>
                                <div class="data__fields">
                                    <label for="cidade" class="data_label">Cidade:</label>
                                    <input class="data__input" type="text" name="cidade" value="{{Auth::user()->cidade}}" id="cidade" placeholder="Nome da cidade" required>
                                </div>
                                <div class="data__fields">
                                    <label for="estado" class="data_label">Estado:</label>
                                    <input class="data__input" type="text" name="estado" value="{{Auth::user()->estado}}" id="estado" maxlength="2" style="text-transform: uppercase" placeholder="ESTADO" required>
                                </div>
                            <p>Dados de Cobrança!</p>
                                <div class="data__fields">
                                    <label for="endCobranca" class="data_label">Endereço de Cobrança</label>
                                    <input class="data__input" type="text" name="endCobranca" value="{{Auth::user()->endCobranca}}" id="endCobranca" placeholder="Nome da rua" required>
                                </div>
                                <div class="data__fields">
                                    <label for="numCobranca" class="data_label">Numero do endereço de Cobrança</label>
                                    <input class="data__input" type="text" name="numCobranca" value="{{Auth::user()->numCobranca}}" id="numCobranca" placeholder="Numero da casa" required>
                                </div>

                                <div class="data__fields">
                                    <label for="compCobranca" class="data_label">Complemento do endereço de Cobrança</label>
                                    <input class="data__input" type="text" name="compCobranca" value="{{Auth::user()->compCobranca}}" id="compCobranca" placeholder="Complemento" required>
                                </div>
                                <div class="data__fields">
                                    <label for="cidadeCobranca" class="data_label">Cidade do endereço de Cobrança</label>
                                    <input class="data__input" type="text" name="cidadeCobranca" value="{{Auth::user()->cidadeCobranca}}" id="cidadeCobranca" placeholder="Cidade" required>
                                </div>
                                <div class="data__fields">
                                    <label for="estadoCobranca" class="data_label">Estado do endereço de Cobrança</label>
                                    <input class="data__input" type="text" name="estadoCobranca" value="{{Auth::user()->estadoCobranca}}" id="estadoCobranca" maxlength="2" placeholder="ESTADO" required>
                                </div>
                                <div class="data__fields">
                                    <label for="cepCobranca" class="data_label">CEP do endereço de Cobrança</label>
                                    <input class="data__input" type="text" name="cepCobranca" value="{{Auth::user()->cepCobranca}}" id="cepCobranca" placeholder="CEP" required>
                                </div>
                            <p>Dados do titular do Cartão!</p>
                                <div class="data__fields">
                                    <label for="nomeCartao" class="data_label">Nome do titular</label>
                                    <input class="data__input" type="text" name="nomeCartao" value="{{Auth::user()->name}}" id="nomeCartao" placeholder="Nome" required>
                                </div>
                                <div class="data__fields">
                                    <label for="cpfCartao" class="data_label">CPF do Titular</label>
                                    <input class="data__input" type="text" name="cpfCartao" value="{{Auth::user()->cpf}}" id="cpfCartao" placeholder="CPF" required>
                                </div>

                                <div class="data__fields">
                                    <label for="nascCartao" class="data_label">Data de nascimento do Títular</label>
                                    <input class="data__input" type="text" name="nascCartao" value="{{Auth::user()->nascimento}}" id="nascCartao" placeholder="Data de nascimento" required>
                                </div>
                                <div class="data__fields">
                                    <label for="dddCartao" class="data_label">DDD</label>
                                    <input class="data__input" type="text" name="dddCartao" value="{{Auth::user()->ddd}}" id="dddCartao" maxlength="2" placeholder="DDD do telefone do titular" required>
                                </div>
                                <div class="data__fields">
                                    <label for="telefoneCartao" class="data_label">Telefone do titular</label>
                                    <input class="data__input" type="text" name="telefoneCartao" value="{{Auth::user()->tel}}" id="telefoneCartao"  placeholder="Telefone do titular do cartão" required>
                                </div>
                            <div class="form-button mt-3">
                                <button type="submit" class="button_login">
                                    FINALIZAR
                                </button>
                                <span class="local" data-local="localhost"></span>
                            </div>
                    </form>
                </div>
                <div class="data__cartao">
                    
                </div>
                <div class="data__boleto">
                    
                </div>
            </div>
        </div>

    @endsection