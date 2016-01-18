<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller {

    public function listArticle() {
        $article = new Article();
        $list = $article->all()->toArray();
        return view('article.index')->with('listArticle', $list);
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