<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use View;
use Validator;
use Request;

class HomeController extends AdminController
{
    public function index()
    {
        if (Auth::check()) {
            return view::make('admin/index');
        }
        else {
            return view::make('admin/login');
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
            return view::make('admin/login')->withInput(request::except('password'))->withErrors($validator);
        }

        $userdata = array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
        );

        if (Auth::attempt($userdata)) {
            return view::make('admin/index');
        } else {
            return view::make('admin/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }

    //chuyển đổi giữa các cache
    public function switchCache()
    {
        //lấy array return từ cache.php
        $cache = include("../config/cache.php");
        //nếu đang dùng cache redis thì chuyển sang file, và ngược lại
        if ($cache["default"] == "redis") {
            $cache["default"] = "file";
        } else {
            $cache["default"] = "redis";
        }

        //đưa lại vào file cache.php
        file_put_contents("../config/cache.php", '<?php return ' . var_export($cache, true) . ';');
    }
}