<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/welcome'); 
});

Route::post('/loginme', 'loginController@login');
Route::post('/acesso/login','loginController@login')->name('acesso.login');
Route::get('acesso/sair','loginController@sair')-> name('acesso.sair');
Route::get('acesso/resetPassword','loginController@resetPassword')-> name('acesso.resetPassword');
Route::post('acesso/resetar','loginController@resetar')-> name('acesso.resetar');

Route::get('/aluno/index', 'AlunoController@index')->name('aluno.index');
Route::get('/aluno/cadastrar', 'AlunoController@create')->name('aluno.create');
Route::post('/aluno/cadastrar', 'AlunoController@store')->name('aluno.store');
Route::get('/aluno/valida', 'AlunoController@valida')->name('aluno.valida');
Route::get('/aluno/edit', 'AlunoController@edit')->name('aluno.edit');
Route::post('/aluno/update', 'AlunoController@update')->name('aluno.update');


Route::get('/aluno/show/{id}', 'AlunoController@show')->name('aluno.show');

Route::get('/usuario/cadastrar', 'UsuarioController@create')->name('usuario.create');
Route::post('/usuario/cadastrar', 'UsuarioController@store')->name('usuario.store');


Route::get('/coordenador/index', 'CoordenadorController@index')->name('coordenador.index');

Route::get('/coordenador/validaaluno', 'CoordenadorController@validaaluno')->name('coordenador.validaaluno');
Route::get('/coordenador/cadastrar', 'CoordenadorController@create')->name('coordenador.create');
Route::post('/coordenador/cadastrar', 'CoordenadorController@store')->name('coordenador.store');
Route::post('/coordenador/editAtv', 'CoordenadorController@editAtv')->name('coordenador.editAtv');

Route::get('/coordenador/atualizaSit/{id}', 'CoordenadorController@atualizaSit')->name('coordenador.atualizaSit');

Route::get('/coordenador/show/{id}', 'CoordenadorController@show')->name('coordenador.show');

Route::get('/coordenador/edit', 'CoordenadorController@edit')->name('coordenador.edit');
Route::post('/coordenador/update', 'CoordenadorController@update')->name('coordenador.update');

Route::get('/coordenador/geraRelatorio/{id}', 'CoordenadorController@geraRelatorio')->name('coordenador.geraRelatorio');

Route::get('/coordenador/rejeitaAtividade/{id}', 'CoordenadorController@rejeitaAtividade')->name('coordenador.rejeitaAtividade');

Route::get('/coordenador/validaAtividade/{id}', 'CoordenadorController@validaAtividade')->name('coordenador.validaAtividade');

Route::get('/coordenador/listaGrupo', 'CoordenadorController@listaGrupo')->name('coordenador.listaGrupo');

Route::get('/administrador/index', 'AdministradorController@index')->name('administrador.index');



Route::get('/grupo/delete/{id}', 'GrupoController@delete')->name('grupo.delete');


Route::get('/grupo/cadastrar', 'GrupoController@create')->name('grupo.create');
Route::post('/grupo/cadastrar', 'GrupoController@store')->name('grupo.store');

Route::get('/atividade/index', 'AtividadeController@index')->name('atividade.index');
Route::get('/atividade/cadastrar', 'AtividadeController@create')->name('atividade.create');
Route::post('/atividade/cadastrar', 'AtividadeController@store')->name('atividade.store');
Auth::routes();


Route::get('/curso/cadastrar', 'CursoController@create')->name('curso.create');
Route::post('/curso/cadastrar', 'CursoController@store')->name('curso.store');



Route::get('/home', 'HomeController@index')->name('home');


