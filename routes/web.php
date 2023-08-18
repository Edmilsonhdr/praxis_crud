<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Endereco;
use App\Models\TipoLogradouro;
use App\Models\Cidade;
use Illuminate\Support\Facades\Validator;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $pessoa = Pessoa::all();
    $endereco = Endereco::all();
    $dados = array_merge(['pessoa' => $pessoa], ['endereco' => $endereco]);
    return view('lista_pessoas', ['dados' => $dados]);
});


Route::get('/cadastrar-pessoa', function () {
    $tiposLogradouro = TipoLogradouro::all();
    $cidade = Cidade::all();
    return view('cadastrar_pessoa', ['tiposLogradouro' => $tiposLogradouro, 'cidade' => $cidade]);
});


Route::post('/cadastrar-pessoa', function (Request $request) {

    $pessoa = Pessoa::create([
        'nome' => $request->pessoa_nome,
        'idade' => $request->pessoa_idade,
        'email' => $request->pessoa_email,
        'sexo' => $request->genero,
        'senha' => $request->pessoa_senha
    ]);


    Endereco::create([
        'pessoa_id' => $pessoa->id,
        'tipo_logradouro_id' => $request->Logradouro,
        'cidade_id' => $request->cidade,
        'logradouro' => $request->pessoa_logradouro,
        'numero' => $request->pessoa_numero_rua,
        'cep' => $request->pessoa_cep,
        'bairro' => $request->pessoa_bairro,
    ]);

    return redirect('/');
});

Route::get('/editar_pessoa/{id_pessoa}', function ($id_pessoa) {

    $pessoa = Pessoa::find($id_pessoa);

    if ($pessoa) {
        $endereco = Endereco::where('pessoa_id', $pessoa->id)->first();
    } else {
        dd('erro');
    }

    return view('edit_pessoa', ['pessoa' => $pessoa], ['endereco' => $endereco]);
});



Route::put('/atualizar_pessoa/{id_pessoa}', function (Request $request, $id_pessoa) {
    $pessoa = Pessoa::findOrFail($id_pessoa);
    $endereco = Endereco::where('pessoa_id', $pessoa->id)->first();

    $pessoa->nome = $request->pessoa_nome;
    $pessoa->idade = $request->pessoa_idade;
    $pessoa->email = $request->pessoa_email;
    $pessoa->sexo = $request->genero;
    $pessoa->senha = $request->pessoa_senha;

    $endereco->tipo_logradouro_id =  $request->Logradouro;
    $endereco->cidade_id = $request->cidade;
    $endereco->logradouro = $request->pessoa_logradouro;
    $endereco->numero = $request->pessoa_numero_rua;
    $endereco->cep = $request->pessoa_cep;
    $endereco->bairro = $request->pessoa_bairro;
    $pessoa->save();
    $endereco->save();
    return redirect('/');
});

Route::delete('/excluir-pessoa/{id_pessoa}', function ($id_pessoa) {
    $pessoa = Pessoa::findOrFail($id_pessoa);
    $pessoa->delete();
    return redirect('/');
})->name('excluir_pessoa');
