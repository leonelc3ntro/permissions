<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;
use Validator;
use View;

class UsuariosController extends Controller {
	public function index() {
		$users = User::all();
		return View::make('users.index')
			->with('users', $users);

		//return view('home');
	}

	public function create() {
		return View::make('users.create');
	}
	public function store() {
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name' => 'required',
			'email' => 'required|email',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('users/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$user = new User;
			$user->name = Input::get('name');
			$user->email = Input::get('email');

			$user->save();

			// redirect
			Session::flash('message', 'Successfully created user!');
			return Redirect::to('users');
		}
	}
	public function show($id) {
		// get the user
		$user = User::find($id);

		// show the view and pass the user to it
		return View::make('users.show')
			->with('user', $user);
	}
	public function edit($id) {
		// get the user
		$user = User::find($id);

		// show the edit form and pass the user
		return View::make('users.edit')
			->with('user', $user);
	}
	public function update($id) {
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name' => 'required',
			'email' => 'required|email',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('users/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$user = user::find($id);
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->save();

			// redirect
			Session::flash('message', 'Successfully updated user!');
			return Redirect::to('users');
		}
	}
	public function destroy($id) {
		// delete
		$user = User::find($id);
		$user->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the user!');
		return Redirect::to('users');
	}
}
