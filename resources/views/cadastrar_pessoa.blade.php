<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Cadastro de Pessoas</title>
</head>

<body>
    <h1>Cadastro de Pessoas</h1>
    <hr>

    <form action="/cadastrar-pessoa" method="POST">
        @csrf
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
                    <input class="input-text" type="text" name="pessoa_nome">

                </div>

                <div class="campo">
                    <label for="">Idade:<span style="color:red">*</span></label><br>
                    <input class="input-text" type="number" name="pessoa_idade">
                </div>
                <div class="campo">
                    <label for="">E-mail:<span style="color:red">*</span></label><br>
                    <input class="input-text" type="email" name="pessoa_email">
                </div>
                <div class="campo">
                    <label>Sexo:</label><br>
                    <div>
                        <label>
                            <input type="radio" name="genero" value="masculino">
                            Masculino
                        </label>
                        <label>
                            <input type="radio" name="genero" value="feminino">
                            Feminino
                        </label>
                    </div>
                </div>
            </div>
            <div style="display:flex; gap:50px">
                <div class="campo">
                    <label for="">Senha:<span style="color:red">*</span></label><br>
                    <input class="input-text" type="password" name="pessoa_senha">
                </div>
                <div class="campo">
                    <label for="">Confirmação de senha:<span style="color:red">*</span></label><br>
                    <input class="input-text" type="password" name="pessoa_confirmar_senha">
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

                        <input class="input-text" id="pessoa_cep" type="number" name="pessoa_cep">
                        <button class="width:200px" id="buscarEndereco">Buscar pelo cep</button>
                    </div>
                </div>
                <br>

                <div style="display:flex; gap:18px">
                    <div class="campo">
                        <label for="logradouro">Tipo Logradouro:<span style="color:red">*</span></label>
                        <select id="Logradouro" name="Logradouro" class="input-text">
                            <option value="">Selecione um logradouro</option>
                            @foreach ($tiposLogradouro as $tipoLogradouro)
                            <option value="{{$tipoLogradouro->id}}">{{$tipoLogradouro->nome}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="campo">
                        <label for="">Logradouro:<span style="color:red">*</span></label><br>
                        <input class="input-text" id="pessoa_logradouro" type="text" name="pessoa_logradouro">
                    </div>

                    <div class="campo">
                        <label for="">Número:<span style="color:red">*</span></label><br>
                        <input class="input-text" id="pessoa_numero" type="number" name="pessoa_numero_rua">
                    </div>

                    <div class="campo">
                        <label for="">Bairro:<span style="color:red">*</span></label><br>
                        <input class="input-text" id="pessoa_bairro" type="text" name="pessoa_bairro">
                    </div>

                </div>
                <div style="margin-top:18px">
                    <div class="campo">
                        <label for="cidade">Cidade:<span style="color:red">*</span></label>
                        <select id="cidade" name="cidade" class="input-text">
                            <option value="">Selecione um tipo de Cidade</option>
                            @foreach ($cidade as $cidade)
                            <option value="{{ $cidade->id }}">{{ $cidade->nome }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


        </fieldset>

        <br />
        <input type="submit" value="Salvar" />
        <input id="limpar" type="reset" value="Limpar" />
        <input type="reset" value="Cancelar" onclick="redirectToCadastro()" />

    </form>




    <script>
        $(document).ready(function() {
            var cepInput = $("#pessoa_cep");
            var logradouroInput = $("#pessoa_logradouro");
            var bairroInput = $("#pessoa_bairro");
            var cidadeSelect = $("#cidade");
            var buscarButton = $("#buscarEndereco");

            buscarButton.on("click", function() {
                event.preventDefault(); // Impede o envio do formulário
                var cep = cepInput.val().replace(/\D/g, '');

                if (cep !== "") {
                    $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function(data) {
                        if (!data.erro) {
                            console.log(data);
                            logradouroInput.val(data.logradouro);
                            bairroInput.val(data.bairro);

                            var cidadeLocalidade = data.localidade.trim();
                            cidadeSelect.find("option").prop("selected",
                                false); // Remove todos os atributos "selected"

                            // Encontre a opção pelo valor e marque-a como selecionada
                            cidadeSelect.find("option").each(function() {
                                if ($(this).text().trim() === cidadeLocalidade) {
                                    $(this).prop("selected", true);
                                }
                            });
                        }
                    });
                }
            });

            $("#limpar").on("click", function() {
                // Reseta o formulário para os valores originais
                $("#updateForm")[0].reset();
            });

            function redirectToCadastro() {
                console.log(45465)
                window.history.back();
            }
        });
    </script>

</body>




</html>