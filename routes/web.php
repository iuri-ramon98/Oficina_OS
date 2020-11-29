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
    return view('welcome');
});

Route::resource('cliente', 'ClienteController');
Route::resource('mecanico', 'MecanicoController');
Route::resource('ordemServico', 'OrdemServicoController');
Route::resource('produto', 'ProdutoController');
Route::resource('servico', 'ServicoController');
Route::resource('veiculo', 'VeiculoController');


Route::get('cliente/show/{id}/{filter?}/', 'ClienteController@showWithFilter')->name('cliente.showWithFilter');


Route::get('veiculo/index/{id}', 'VeiculoController@indexWithId')->name('veiculo.indexWithId');
Route::get('veiculo/create/{id}', 'VeiculoController@createWithId')->name('veiculo.createWithId');
Route::post('veiculo/store/{id}', 'VeiculoController@storeWithId')->name('veiculo.storeWithId');


Route::get('mecanico/show/{id}/{filter?}/', 'MecanicoController@showWithFilter')->name('mecanico.showWithFilter');

Route::get('ordemServico/preencherVeiculo/{id}', 'OrdemServicoController@preencherVeiculo');

Route::post('ordemServico/updateServicoAjax/{id}', 'OrdemServicoController@updateServicoAjax')->name('ordemServico.updateServicoAjax');

Route::post('ordemServico/updateProdutoAjax/{id}', 'OrdemServicoController@updateProdutoAjax')->name('ordemServico.updateProdutoAjax');

Route::post('/ordemServico/removerServicoAjax/{id_os}/{id_servico}', 'OrdemServicoController@removerServicoAjax');

Route::post('/ordemServico/removerProdutoAjax/{id_os}/{id_produto}', 'OrdemServicoController@removerProdutoAjax');