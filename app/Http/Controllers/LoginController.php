<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request){
    	// $request->validate([
    	// 	'email' => ['required', 'email'],
    	// 	'password' => ['required', 'password']
    	// ]);

    	// $user = User::where('email', $request->email)->first();

    	// if(!$user || Hash::check($request->password, $user->password)){
    	// 	throw ValidationException::withMessage([
    	// 		'email' => ['The provided credentials are incorrect'];
    	// 	]);
    	// }

    	return "sample";
    }
}
