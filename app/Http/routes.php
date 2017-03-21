<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

use Illuminate\Http\Request;

Route::get('/', function () {
	return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::resource('/users', 'UsuariosController');

///////////////////////////////////
Route::get('productajaxCRUD', function () {
	$products = App\Models\Product::all();
	return view('ajax.index')->with('products', $products);
});
Route::get('productajaxCRUD/{product_id?}', function ($product_id) {
	$product = App\Models\Product::find($product_id);
	return response()->json($product);
});
Route::post('productajaxCRUD', function (Request $request) {
	$product = App\Models\Product::create($request->input());
	return response()->json($product);
});
Route::put('productajaxCRUD/{product_id?}', function (Request $request, $product_id) {
	$product = App\Models\Product::find($product_id);
	$product->name = $request->name;
	$product->details = $request->details;
	$product->save();
	return response()->json($product);
});
Route::delete('productajaxCRUD/{product_id?}', function ($product_id) {
	$product = App\Models\Product::destroy($product_id);
	return response()->json($product);
});
////////////////////////

Route::get('usersAjax', function () {
	$users = App\Models\User::all();
	return view('ajaxUsers.index')->with('users', $users);
});
Route::get('usersAjax/{user_id?}', function ($user_id) {
	$user = App\Models\User::find($user_id);
	return response()->json($user);
});
Route::post('usersAjax', function (Request $request) {
	$user = App\Models\User::create($request->input());
	return response()->json($user);
});
Route::put('usersAjax/{user_id?}', function (Request $request, $user_id) {
	$user = App\Models\User::find($user_id);
	$user->name = $request->name;
	$user->email = $request->email;
	$user->save();
	return response()->json($user);
});
Route::delete('usersAjax/{user_id?}', function ($user_id) {
	$user = App\Models\User::destroy($user_id);
	return response()->json($user);
});

///////////////////////////////////
Route::get('clientes', function () {
	$clientes = App\Models\Cliente::all();
	return view('clientes.index')->with('clientes', $clientes);
});
Route::get('clientes/{cliente_id?}', function ($cliente_id) {
	$cliente = App\Models\Cliente::find($cliente_id);
	return response()->json($cliente);
});
Route::post('clientes', function (Request $request) {
	$cliente = App\Models\Cliente::create($request->input());
	return response()->json($cliente);
});
Route::put('clientes/{cliente_id?}', function (Request $request, $cliente_id) {
	$cliente = App\Models\Cliente::find($cliente_id);
	$cliente->name = $request->name;
	$cliente->details = $request->details;
	$cliente->save();
	return response()->json($cliente);
});
Route::delete('clientes/{cliente_id?}', function ($cliente_id) {
	$cliente = App\Models\Cliente::destroy($cliente_id);
	return response()->json($cliente);
});

///////////////////////////////////
Route::get('usuarios', function () {
	$usuarios = App\Models\User::all();
	return view('usuarios.index')->with('usuarios', $usuarios);
});
Route::get('usuarios/{usuario_id?}', function ($usuario_id) {
	$usuario = App\Models\User::find($usuario_id);
	return response()->json($usuario);
});
Route::post('usuarios', function (Request $request) {	
	$usuario = App\Models\User::create($request->input());
	return response()->json($usuario);
});
Route::put('usuarios/{usuario_id?}', function (Request $request, $usuario_id) {
	$usuario = App\Models\User::find($usuario_id);
	$usuario->name = $request->name;
	$usuario->email = $request->email;
	$usuario->password = bcryp($request->password);
	$usuario->save();
	return response()->json($usuario);
});
Route::delete('usuarios/{usuario_id?}', function ($usuario_id) {
	$usuario = App\Models\User::destroy($usuario_id);
	return response()->json($usuario);
});
////////////////////////////////////////
Route::get('roles', function () {
	$roles = App\Models\Role::all();
	return view('roles.index')->with('roles', $roles);
});
Route::get('roles/{usuario_id?}', function ($usuario_id) {
	$role = App\Models\Role::find($usuario_id);
	return response()->json($role);
});
Route::post('roles', function (Request $request) {
	$role = App\Models\Role::create($request->input());
	return response()->json($role);
});
Route::put('roles/{usuario_id?}', function (Request $request, $usuario_id) {
	$role = App\Models\Role::find($usuario_id);
	$role->name = $request->name;
	$role->details = $request->details;
	$role->save();
	return response()->json($role);
});
Route::delete('roles/{usuario_id?}', function ($usuario_id) {
	$role = App\Models\Role::destroy($usuario_id);
	return response()->json($role);
});
////////////////////////