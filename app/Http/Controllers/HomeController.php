<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use View;
use Validator;


class HomeController extends Controller {

    public function index() {
        if(Auth::check()) {
            return view::make('/index');
        } else {
            return view::make('/login');
        }
    }

    public function login() {
        $rules = array(
            'email'=>'required|email',
            'password'=>'required|min:6'
        );
        $validator = Validator::make(Input::all(), $rules);
        if( $validator->fails() )
            return view('/login')->withInput(Input::except('password'))->withErrors($validator);

        $userdata = array(
            'email'=>Input::get('email'),
            'password'=>Input::get('password'),
        );

        if (Auth::attempt($userdata))
        {
            return view::make('/index');
        } else {
            return view::make('/login');
        }
    }

}