<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Input;
use View;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class HomeController extends Controller {

    public function index() {
        if(Auth::check()) {
            return view::make('/index');
        } else {
            return view::make('/login');
        }
    }

    public function login() {
        $email = Input::get('email');
        $password = Input::get('password');
        var_dump(Auth::attempt(array('email' => $email, 'password' => $password)));

        if (Auth::attempt(array('email' => $email, 'password' => $password)))
        {
            return view::make('/index');
        } else {
            return view::make('/login');
        }
    }

}