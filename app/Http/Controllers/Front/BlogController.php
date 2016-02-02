<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\Category;

class BlogController extends FrontController
{
    public function index()
    {
        /*$redis = new Redis();
        $redis->connect('localhost', 6379);
        $redis->set('demo', 'Thử', 10);  //10 giây
        return $redis->get('demo');*/

        /*        $memcache = new Memcache();
                $memcache->connect('localhost', 11211) or die ("Could not connect");
                $memcache->set('demo', 'Demo', false, 1);
                return $memcache->get('demo');*/

        $listCategory = Category::all(["id", "category_alias", "category_name"])->toArray();
        $listArticle = Article::orderBy('created_date', 'desc')->paginate(3);

        return view('front.blog.index', compact('listCategory', 'listArticle'));
    }

    public function getArticles($cate)
    {
        $listCategory = Category::all(["id", "category_alias", "category_name"])->toArray();
        $category = Category::where("category_alias", $cate)->first();
        if ($category != null) {
            $message = "";
            $category_name = $category["category_name"];
            $listArticle = Article::where('category_id', $category["id"])->orderBy('created_date', 'desc')->paginate(3);
            if (count($listArticle) == 0) {
                $message = 'Chưa có bài viết nào.';
            } else {

            }
        }
        return view('front.blog.index', compact('listCategory', 'listArticle', 'message', 'category_name'));
    }

    //lấy dữ liệu đưa lên article.blade.php
    //tham số category alias và article alias
    public function getArticle($cate, $arti)
    {

        $arti = substr($arti, 0, -5);       //cắt chuối ".html" cuối article alias
        $category = Category::where("category_alias", $cate)->first();      //lấy category đầu tiên có alias bằng tham số category alias

        $listCategory = Category::all(["id", "category_alias", "category_name"])->toArray();
        $allArticles = Article::all(["id", "title", "alias", "summary", "content", "image", "category_id", "author", "created_date"])->where('category_id', $category["id"])->toArray();      //lấy tất cả bài viết trong category


        if ($category != null) {
            $message = "";
            $category_name = $category["category_name"];

            if (count($allArticles) == 0) {
                $message = 'Không có bài viết nào.';
            } else {
                $article = Article::where("alias", $arti)->first();
                if ($article != null) {
                    $relateArticles = Article::where('category_id', $category["id"])->where("id", '!=', $article["id"])->orderBy('created_date', 'desc')->get()->take(2)->toArray();
                    return view('front.blog.article', compact('listCategory', 'relateArticles', 'message', 'category_name', 'article', 'mess'));
                } else {
                    $message = "Không tìm thấy bài viết phù hợp";
                    return view('front.blog.error', compact('listCategory', 'message', 'category_name'));
                }
            }
            return view('blog.index', compact('listCategory', 'message', 'category_name'));
        }
    }

//hàm tạo bỏ dấu. chuyển thành alias
    function remove_utf8($string)
    {
        $trans = array("đ" => "d", "ă" => "a", "â" => "a", "á" => "a", "à" => "a", "ả" => "a", "ã" => "a", "ạ" => "a", "ấ" => "a", "ầ" => "a", "ẩ" => "a", "ẫ" => "a", "ậ" => "a", "ắ" => "a", "ằ" => "a", "ẳ" => "a", "ẵ" => "a", "ặ" => "a", "é" => "e", "è" => "e", "ẻ" => "e", "ẽ" => "e", "ẹ" => "e", "ế" => "e", "ề" => "e", "ể" => "e", "ễ" => "e", "ệ" => "e", "í" => "i", "ì" => "i", "ỉ" => "i", "ĩ" => "i", "ị" => "i", "ư" => "u", "ô" => "o", "ơ" => "o", "ê" => "e", "Ư" => "u", "Ô" => "o", "Ơ" => "o", "Ê" => "e", "ú" => "u", "ù" => "u", "ủ" => "u", "ũ" => "u", "ụ" => "u", "ứ" => "u", "ừ" => "u", "ử" => "u", "ữ" => "u", "ự" => "u", "ó" => "o", "ò" => "o", "ỏ" => "o", "õ" => "o", "ọ" => "o", "ớ" => "o", "ờ" => "o", "ở" => "o", "ỡ" => "o", "ợ" => "o", "ố" => "o", "ồ" => "o", "ổ" => "o", "ỗ" => "o", "ộ" => "o", "ú" => "u", "ù" => "u", "ủ" => "u", "ũ" => "u", "ụ" => "u", "ứ" => "u", "ừ" => "u", "ử" => "u", "ữ" => "u", "ự" => "u", "ý" => "y", "ỳ" => "y", "ỷ" => "y", "ỹ" => "y", "ỵ" => "y", "Ý" => "Y", "Ỳ" => "Y", "Ỷ" => "Y", "Ỹ" => "Y", "Ỵ" => "Y", "Đ" => "D", "Ă" => "A", "Â" => "A", "Á" => "A", "À" => "A", "Ả" => "A", "Ã" => "A", "Ạ" => "A", "Ấ" => "A", "Ầ" => "A", "Ẩ" => "A", "Ẫ" => "A", "Ậ" => "A", "Ắ" => "A", "Ằ" => "A", "Ẳ" => "A", "Ẵ" => "A", "Ặ" => "A", "É" => "E", "È" => "E", "Ẻ" => "E", "Ẽ" => "E", "Ẹ" => "E", "Ế" => "E", "Ề" => "E", "Ể" => "E", "Ễ" => "E", "Ệ" => "E", "Í" => "I", "Ì" => "I", "Ỉ" => "I", "Ĩ" => "I", "Ị" => "I", "Ư" => "U", "Ô" => "O", "Ơ" => "O", "Ê" => "E", "Ư" => "U", "Ô" => "O", "Ơ" => "O", "Ê" => "E", "Ú" => "U", "Ù" => "U", "Ủ" => "U", "Ũ" => "U", "Ụ" => "U", "Ứ" => "U", "Ừ" => "U", "Ử" => "U", "Ữ" => "U", "Ự" => "U", "Ó" => "O", "Ò" => "O", "Ỏ" => "O", "Õ" => "O", "Ọ" => "O", "Ớ" => "O", "Ờ" => "O", "Ở" => "O", "Ỡ" => "O", "Ợ" => "O", "Ố" => "O", "Ồ" => "O", "Ổ" => "O", "Ỗ" => "O", "Ộ" => "O", "Ú" => "U", "Ù" => "U", "Ủ" => "U", "Ũ" => "U", "Ụ" => "U", "Ứ" => "U", "Ừ" => "U", "Ử" => "U", "Ữ" => "U", "Ự" => "U",);

        //remove any '-' from the string they will be used as concatonater
        $str = str_replace('-', ' ', $string);
        $str = strtr($str, $trans);
        // remove any duplicate whitespace, and ensure all characters are alphanumeric
        $str = preg_replace(array('/\s+/', '/[^A-Za-z0-9\-]/'), array('-', ''), $str);
        // lowercase and trim
        $str = trim(strtolower($str));
        return $str;
    }
}