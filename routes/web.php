<?php

use App\Models\Candidatos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

    return view('cadastro');

});

Route::post('/cadastrar-candidato', function(Request $dados) {

    Candidatos::create([
        'nome' => $dados->nome_candidato,
        'email' => $dados->email_candidato
    ]);
    echo 'Candidato criado com sucesso!!';

});

Route::get('/mostrar-candidato/{id_do_candidato}', function($id_do_candidato){

    $candidato = Candidatos::findOrFail($id_do_candidato);
    echo $candidato->nome;
    echo '<br>';
    echo $candidato->email;

});

Route::get('/editar-candidato/{id_do_candidato}',  function($id_do_candidato){

    $candidato = Candidatos::findOrFail($id_do_candidato);
    return view('editar-candidato', ['candidato' => $candidato]);

});

Route::put('/atualizar-candidato/{id_do_candidato}', function(Request $informacao, $id_do_candidato){

    $candidato = Candidatos::findOrFail($id_do_candidato);

    $candidato->nome = $informacao->nome_candidato;
    $candidato->email = $informacao->email_candidato;
    $candidato->save();

    echo "Candidato Atualizado com sucesso!";

});

Route::get('/excluir-candidato/{id_do_candidato}', function($id_do_candidato){

    $candidato = Candidatos::findOrFail($id_do_candidato);
    $candidato->delete();
    
    echo 'Candidato excluido com sucesso!';

});