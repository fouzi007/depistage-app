<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Notifications\AccountCreatedNotification;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

	public function index() {
		$users = User::paginate(10);
		return view('users.index',compact('users'));
	}

	public function store(UserCreateRequest $request) {
		$attributes = $request->all();
		$attributes['password'] = bcrypt($attributes['password']);
		$user = User::create($attributes);
		$user->roles()->attach(Role::find($request->role_id));
		$user->notify(new AccountCreatedNotification($request->password,$request->email));
		return redirect(route('users.index'))->with('message','Utilisateur créé avec succès');
	}

    public function profile () {
    	return view('profile');
    }

    public function requestEdit (Request $request) {
	    $attributes = $request->validate([
    		'password' => 'confirmed'
	    ]);
    	Auth::user()->update([
    		'password' => bcrypt($request->get('password'))
	    ]);
	    Auth::logout();
    	return redirect(route('login'));
    }
}
