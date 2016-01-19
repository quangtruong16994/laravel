<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use View;
use Validator;
use Request;

class HomeController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            return view::make('/index');
        } else {
            return view::make('/login');
        }
    }

    public function login()
    {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|min:6'
        );
        $messages = [
            'email.required' => 'Yêu cầu nhập email.',
            'email.email' => 'Email sai định dạng. Yêu cầu nhập lại.',
            'password.required' => 'Yêu cầu nhập mật khẩu.',
            'password.min' => 'Mật khẩu cần lớn hơn hoặc bằng 6.'
        ];

        $validator = Validator::make(request::all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('/login')->withInput(request::except('password'))->withErrors($validator);
        }

        $userdata = array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
        );

        if (Auth::attempt($userdata)) {
            return view::make('/index');
        } else {
            return view::make('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}