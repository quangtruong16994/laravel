<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class UserController extends AdminController {

    public function listUser() {
        $user = new User();
        $list = $user->all()->toArray();
        return view('admin.user.index')->with('listUser', $list);

    }

    public function add(Request $request) {

    }

    public function delete() {
        $id = Input::get('id');
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/user/');
    }
}