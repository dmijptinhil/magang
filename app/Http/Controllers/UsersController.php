<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
	public function index() {
		$users = User::all();
		return view('users.index')->with('users', $users);
	}

	public function edit($user_id) {
		$user = User::find($user_id);
		return view('users.edit')->with('user', $user);
	}

	public function update(Request $request, $id) {
		$user = User::find($id);
		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->role = $request->input('role');
		
		// User wants to change the password
		if($request->input('password') != "" && $request->input('password-conf') != "") {

			// Check if the passwords match
			if($request->input('password') == $request->input('password-conf')) {
				$user->password = bcrypt($request->input('password'));
			}else{
				return redirect('users/edit/' . $id)->with('error', 'Kata sandi tidak sesuai');
			}
		}

		$user->save();
		return redirect('users')->with('success', 'data user berhasil diperbarui');
	}

	public function create() {
		return view('users.create');
	}

	public function store(Request $request) {
		if($request->input('password') == $request->input('password-conf')) {
			$user = new User;
			$user->name = $request->input('name');
			$user->email = $request->input('email');
			$user->role = $request->input('role');
			$user->password = bcrypt($request->input('password'));
			$user->save();
			return redirect('users')->with('success', 'User berhasil ditambah');
		}else{
			return redirect('users/create')->with('error', 'Kata sandi tidak cocok');
		}
	}

	public function destroy($user_id) {
		$user = User::find($user_id);
        $user->delete();
        return redirect('users')->with('delete', 'User berhasil dihapus');
	}
}
