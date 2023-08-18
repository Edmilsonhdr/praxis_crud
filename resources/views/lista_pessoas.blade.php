<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Pessoas</title>
</head>

<body>
    <h1>Cadastro de Pessoas</h1>
    <hr>
    <input id="novo" type="button" value="Novo" onclick="direcionarParaCadastro()">

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Idade</th>
                <th>E-mail</th>
                <th>Sexo</th>
                <th>Ação</th>

            </tr>
        </thead>
        <tbody>
            @if (count($dados['pessoa']) > 0)
            @foreach ($dados['pessoa'] as $index => $pessoa)

            <tr>
                <td>{{ $pessoa->nome }}</td>
                @if (isset($dados['endereco'][$index]))
                <td>{{ $dados['endereco'][$index]->logradouro }},
                    {{ $dados['endereco'][$index]->numero }},
                    @if ($dados['endereco'][$index]->tipo_logradouro_id === 1)
                    Rua,
                    @elseif ($dados['endereco'][$index]->tipo_logradouro_id === 2)
                    Avenida,
                    @elseif ($dados['endereco'][$index]->tipo_logradouro_id === 3)
                    Praça,
                    @else
                    Outro,
                    @endif
                    @if ($dados['endereco'][$index]->cidade_id === 1)
                    Belo Horizonte
                    @elseif ($dados['endereco'][$index]->cidade_id === 2)
                    Betim
                    @elseif ($dados['endereco'][$index]->cidade_id === 3)
                    Contagem
                    @else
                    Outra Cidade
                    @endif
                </td>
                <td>{{ $dados['pessoa'][$index]->idade }}</td>
                <td>{{ $dados['pessoa'][$index]->email }}</td>
                <td>{{ $dados['pessoa'][$index]->sexo }}</td>
                <td>
                    <button onclick="direcionarParaEditar(this)" data-id="{{ $pessoa->id }}">Editar</button>

                    <button onclick="excluirPessoa('{{ $pessoa->id }}')">Excluir Pessoa</button>

                    <form id="excluirForm-{{ $pessoa->id }}" action="{{ route('excluir_pessoa', ['id_pessoa' => $pessoa->id]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

                </td>

                @else

                <td colspan="2">Endereço não encontrado</td>
                @endif
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6">Nenhum registro encontrado</td>
            </tr>
            @endif
        </tbody>
    </table>


    <script>
        function direcionarParaCadastro() {
            window.location.href = "{{ url('/cadastrar-pessoa') }}";
        }

        function direcionarParaEditar(button) {
            var id = button.getAttribute("data-id");
            window.location.href = "{{ url('/editar_pessoa/') }}" + '/' + id;
        }

        function excluirPessoa(id) {
            if (confirm('Tem certeza que deseja excluir?')) {
                document.getElementById('excluirForm-' + id).submit();
            }
        }
    </script>



</body>


</html>