<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoas</title>
</head>

<body>
    <h1>Cadastro de Pessoas</h1>
    <hr>

    <form action="/atualizar_pessoa/{{$pessoa->id}}" method="POST">
        @csrf
        @method("PUT")
        <fieldset>
            <legend>Dados Pessoais</legend>
            <style>
                .campo {
                    display: flex;
                    flex-direction: column;
                    margin-bottom: 10px;
                }

                label {
                    margin-bottom: 5px;
                }

                .input-text {
                    width: 220px;
                }
            </style>

            <div style="display:flex; gap:50px">
                <div class=" campo">
                    <label for="">Nome:<span style="color:red">*</span></label><br>
                    <input class="input-text" type="text" name="pessoa_nome" value="{{ $pessoa->nome }}">
                </div>

                <div class=" campo">
                    <label for="">Idade:<span style="color:red">*</span></label><br>
                    <input class="input-text" type="number" name="pessoa_idade" value="{{ $pessoa->idade }}">
                </div>

                <div class=" campo">
                    <label for="">E-mail:<span style=" color:red">*</span></label><br>
                    <input class="input-text" type="email" name="pessoa_email" value="{{ $pessoa->email }}">
                </div>

                <div class=" campo">
                    <label>Sexo:</label><br>
                    <div>
                        <label>
                            <input type="radio" name="genero" value="masculino" {{ $pessoa->sexo === 'masculino' ? 'checked' : '' }}>
                            Masculino
                        </label>
                        <label>
                            <input type="radio" name="genero" value="feminino" {{ $pessoa->sexo === 'feminino' ? 'checked' : '' }}>
                            Feminino
                        </label>
                    </div>
                </div>
            </div>
            <div style="display:flex; gap:50px">
                <div class="campo">
                    <label for="">Senha:<span style="color:red">*</span></label><br>
                    <input class="input-text" type="password" name="pessoa_senha" value="{{ $pessoa->senha }}">
                </div>

                <div class="campo">
                    <label for="">Confirmação de senha:<span style="color:red">*</span></label><br>
                    <input class="input-text" type="password" name="pessoa_confirmar_senha" value="{{ $pessoa->senha }}">
                </div>
            </div>

        </fieldset>

        <fieldset>
            <legend>Endereço <small>(o endereço não é pbrigatorio, mas caso seja informado, os campos com * são
                    obrigatorios)</small>
            </legend>

            <div>
                <div class="campo">
                    <label for="">cep:<span style="color:red">*</span></label>
                    <div style="display:flex; gap:18px">
                        <input class="input-text" type="number" name="pessoa_cep" value="{{ $endereco->cep }}">
                        <button class="width:200px">Buscar pelo cep</button>
                    </div>
                </div>
                <br>

                <div style="display:flex; gap:18px">
                    <div class="campo">
                        <label for="logradouro">Tipo Logradouro:<span style="color:red">*</span></label>
                        <select id="Logradouro" name="Logradouro" class="input-text">
                            <option value="1">Rua</option>
                            <option value="2">Avenida</option>
                            <option value="3">Praça</option>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="">Logradouro:<span style="color:red">*</span></label><br>
                        <input class="input-text" type="text" name="pessoa_logradouro" value="{{ $endereco->logradouro }}">
                    </div>

                    <div class="campo">
                        <label for="">Número:<span style="color:red">*</span></label><br>
                        <input class="input-text" type="number" name="pessoa_numero_rua" value="{{ $endereco->numero }}">
                    </div>

                    <div class="campo">
                        <label for="">Bairro:<span style="color:red">*</span></label><br>
                        <input class="input-text" type="text" name="pessoa_bairro" value="{{ $endereco->bairro }}">
                    </div>
                </div>
                <div style="margin-top:18px">
                    <div class="campo">
                        <label for="cidade">Cidade:<span style="color:red">*</span></label>
                        <select id="cidade" name="cidade" class="input-text">
                            <option value="1">Belo Horizonte</option>
                            <option value="2">Betim</option>
                            <option value="3">Contagem</option>
                        </select>
                    </div>
                </div>

            </div>


        </fieldset>

        <br />
        <input type="submit" value="Salvar" />
        <input id="Limpar" type="reset" value="Limpar" />

        <input type="reset" value="Cancelar" />
    </form>
</body>


</html>