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
        //có thể có cách khác assign biến ra
        //return view('article.index',compact('list')); <== phần này ở ngoài sẽ đọc luôn cái list
    }

    public function add(Request $request) {
        $all = $request -> all();
    }

    public function delete() {
        $id = Input::get('id');
        $user = User::find($id);
        $user->delete();
        return redirect()->action('UserController@listUser');
        //hoặc em có thể redirect kiểu khác
        //return redirect('url_can_redirect') <= cách này thì nó bớt phải tính toán hơn
    }
}