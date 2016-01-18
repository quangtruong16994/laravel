<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class UserController extends Controller {

    public function listUser() {
        $user = new User();
        $list = $user->all()->toArray();
        return view('user.index')->with('listUser', $list);

    }

    public function add(Request $request) {
        $all = $request -> all();
    }

    public function delete() {
        $id = Input::get('id');
        $user = User::find($id);
        $user->delete();

        return redirect()->action('UserController@listUser');
    }
}