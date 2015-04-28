<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller {

    public function signup(Request $request)
    {
        $type = $request->input('type');

        return view('signup', [
            'type' => $type
        ]);
    }

    public function processSignup(Request $request)
    {
        return view('welcome');
    }

}