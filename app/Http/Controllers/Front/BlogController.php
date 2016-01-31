<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\Category;
use Cache;

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

        if (Cache::has('allCategories')) {
            $listCategory = Cache::get('allCategories');
            $mess = "Lấy tất cả category từ cache.";
        } else {
            $listCategory = Category::all(["id", "category_alias", "category_name"])->toArray();
            Cache::put("allCategories", $listCategory, 100);
            $mess = "Lấy tất cả category từ csdl.";
        }

        // phân trang kết hợp với cache
        $per_page = 3;
        $page = (isset($_GET["page"])) ? $_GET["page"] : 1;         //lấy parameter page trên url
        $key = "articles_" . $page;                                 //key cho từng trang

        //kiểm tra tồn tại trong cache, nếu có thì lấy từ cache, nếu không thì lấy từ csdl
        if (Cache::has("articles_" . $page)) {
            $listArticle = Cache::get("articles_" . $page);
            $mess .= " Lấy tất cả article phân trang từ cache.";
        } else {
            $listArticle = Cache::remember($key, 100, function () use ($per_page) {
                return Article::orderBy('created_date', 'desc')->paginate(3);
            });
            Cache::put("articles_" . $page, $listArticle, 100);
            $mess .= " Lấy tất cả article phân trang từ csdl.";
        }

        return view('front.blog.index', compact('listCategory', 'listArticle', 'mess'));
    }

    public function getArticles($cate)
    {
        //kiểm tra tồn tại allCategories trong cache, nếu có thì lấy từ cache, nếu không thì lấy từ csdl
        if (Cache::has('allCategories')) {
            $listCategory = Cache::get('allCategories');
            $mess = "Lấy tất cả category từ cache.";
        } else {
            $listCategory = Category::all(["id", "category_alias", "category_name"])->toArray();
            Cache::put("allCategories", $listCategory, 100);
            $mess = "Lấy tất cả category từ csdl.";
        }

        $per_page = 3;
        $page = (isset($_GET["page"])) ? $_GET["page"] : 1;         //lấy parameter page trên url
        $key = "articlesByCategory_" . $cate . $page;        //key cho từng trang

        //kiểm tra tồn tại articleByCategory trong cache, nếu có thì lấy từ cache, nếu không thì lấy từ csdl
        if (Cache::has("articlesByCategory_" . $cate . $page)) {
            $listArticle = Cache::get("articlesByCategory_" . $cate . $page);
            $category_name = Cache::get("categoryname_" . $cate);
            $mess .= " Lấy các bài viết phân trang theo category từ cache";
        } else {
            $category = Category::where("category_alias", $cate)->first();
            if ($category != null) {
                $message = "";
                $category_name = $category["category_name"];

                //kiểm tra tồn tại trong cache, nếu có thì lấy từ cache, nếu không thì lấy từ csdl
                $listArticle = Cache::remember($key, 100, function () use ($per_page, $category) {
                    return Article::where('category_id', $category["id"])->orderBy('created_date', 'desc')->paginate(3);
                });
                Cache::put("articlesByCategory_" . $cate . $page, $listArticle, 100);
                $mess .= " Lấy các bài viết phân trang theo category từ csdl";
                Cache::put("categoryname_" . $cate, $category_name, 100);
                if (count($listArticle) == 0) {
                    $message = 'Chưa có bài viết nào.';
                }
            }
        }
        return view('front.blog.index', compact('listCategory', 'listArticle', 'message', 'category_name', 'mess'));
    }

    //lấy dữ liệu đưa lên article.blade.php
    //tham số category alias và article alias
    public function getArticle($cate, $arti)
    {
        $arti = substr($arti, 0, -5);       //cắt chuối ".html" cuối article alias
        $category = Category::where("category_alias", $cate)->first();      //lấy category đầu tiên có alias bằng tham số category alias

        //kiểm tra tồn tại allCategories trong cache, nếu có thì lấy từ cache, nếu không thì lấy từ csdl
        if (Cache::has('allCategories')) {
            $listCategory = Cache::get('allCategories');
            $mess = "Lấy tất cả category từ cache.";
        } else {
            $listCategory = Category::all(["id", "category_alias", "category_name"])->toArray();
            Cache::put("allCategories", $listCategory, 100);
            $mess = "Lấy tất cả category từ csdl.";
        }

        //lấy các bài viết cùng category của article
        if (Cache::has("articlesByCategory" . $cate)) {
            $allArticles = Cache::get("articlesByCategory" . $cate);
            $mess .= " Lấy tất cả bài viết cùng category vs bài viết hiện tại từ cache.";
        } else {
            $allArticles = Article::all(["id", "title", "alias", "summary", "content", "image", "category_id", "author",
                "created_date"])->where('category_id', $category["id"])->toArray();      //lấy tất cả bài viết trong category
            Cache::put("articlesByCategory" . $cate, $allArticles, 100);
            $mess .= " Lấy tất cả bài viết cùng category vs bài viết hiện tại từ csdl.";
        }

        if (Cache::has("article_" . $arti)) {
            $article = Cache::get("article_" . $arti);
            $category_name = Cache::get("categoryname_" . $cate);
            $relateArticles = Cache::get("relativeArticles_" . $arti);
            $mess .= " Lấy chi tiết bài viết, bài viết liên quan từ cache.";
            return view('front.blog.article', compact('listCategory', 'relateArticles', 'message', 'category_name', 'article', 'mess'));
        } else {
            if ($category != null) {
                $message = "";
                $category_name = $category["category_name"];
                Cache::put("categoryname_" . $cate, $category_name, 100);

                if (count($allArticles) == 0) {
                    $message = 'Không có bài viết nào.';
                } else {
                    $article = Article::where("alias", $arti)->first();
                    Cache::put("article_" . $arti, $article, 100);
                    if ($article != null) {
                        $relateArticles = Article::where('category_id', $category["id"])->where("id", '!=', $article["id"])
                            ->orderBy('created_date', 'desc')->get()->take(2)->toArray();
                        $mess .= " Lấy chi tiết bài viết, bài viết liên quan từ csdl.";
                        Cache::put("relativeArticles_" . $arti, $relateArticles, 100);
                        return view('front.blog.article', compact('listCategory', 'relateArticles', 'message', 'category_name', 'article', 'mess'));
                    } else {
                        $message = "Không tìm thấy bài viết phù hợp";
                        return view('front.blog.error', compact('listCategory', 'message', 'category_name'));
                    }
                }
                return view('blog.index', compact('listCategory', 'message', 'category_name'));
            }
        }
    }

    //hàm tạo bỏ dấu. chuyển thành alias
    function remove_utf8($string)
    {
        $trans = array(
            "đ" => "d", "ă" => "a", "â" => "a", "á" => "a", "à" => "a",
            "ả" => "a", "ã" => "a", "ạ" => "a",
            "ấ" => "a", "ầ" => "a", "ẩ" => "a", "ẫ" => "a", "ậ" => "a",
            "ắ" => "a", "ằ" => "a", "ẳ" => "a", "ẵ" => "a", "ặ" => "a",
            "é" => "e", "è" => "e", "ẻ" => "e", "ẽ" => "e", "ẹ" => "e",
            "ế" => "e", "ề" => "e", "ể" => "e", "ễ" => "e", "ệ" => "e",
            "í" => "i", "ì" => "i", "ỉ" => "i", "ĩ" => "i", "ị" => "i",
            "ư" => "u", "ô" => "o", "ơ" => "o", "ê" => "e",
            "Ư" => "u", "Ô" => "o", "Ơ" => "o", "Ê" => "e",
            "ú" => "u", "ù" => "u", "ủ" => "u", "ũ" => "u", "ụ" => "u",
            "ứ" => "u", "ừ" => "u", "ử" => "u", "ữ" => "u", "ự" => "u",
            "ó" => "o", "ò" => "o", "ỏ" => "o", "õ" => "o", "ọ" => "o",
            "ớ" => "o", "ờ" => "o", "ở" => "o", "ỡ" => "o", "ợ" => "o",
            "ố" => "o", "ồ" => "o", "ổ" => "o", "ỗ" => "o", "ộ" => "o",
            "ú" => "u", "ù" => "u", "ủ" => "u", "ũ" => "u", "ụ" => "u",
            "ứ" => "u", "ừ" => "u", "ử" => "u", "ữ" => "u", "ự" => "u",
            "ý" => "y", "ỳ" => "y", "ỷ" => "y", "ỹ" => "y", "ỵ" => "y",
            "Ý" => "Y", "Ỳ" => "Y", "Ỷ" => "Y", "Ỹ" => "Y", "Ỵ" => "Y",
            "Đ" => "D", "Ă" => "A", "Â" => "A", "Á" => "A", "À" => "A",
            "Ả" => "A", "Ã" => "A", "Ạ" => "A",
            "Ấ" => "A", "Ầ" => "A", "Ẩ" => "A", "Ẫ" => "A", "Ậ" => "A",
            "Ắ" => "A", "Ằ" => "A", "Ẳ" => "A", "Ẵ" => "A", "Ặ" => "A",
            "É" => "E", "È" => "E", "Ẻ" => "E", "Ẽ" => "E", "Ẹ" => "E",
            "Ế" => "E", "Ề" => "E", "Ể" => "E", "Ễ" => "E", "Ệ" => "E",
            "Í" => "I", "Ì" => "I", "Ỉ" => "I", "Ĩ" => "I", "Ị" => "I",
            "Ư" => "U", "Ô" => "O", "Ơ" => "O", "Ê" => "E",
            "Ư" => "U", "Ô" => "O", "Ơ" => "O", "Ê" => "E",
            "Ú" => "U", "Ù" => "U", "Ủ" => "U", "Ũ" => "U", "Ụ" => "U",
            "Ứ" => "U", "Ừ" => "U", "Ử" => "U", "Ữ" => "U", "Ự" => "U",
            "Ó" => "O", "Ò" => "O", "Ỏ" => "O", "Õ" => "O", "Ọ" => "O",
            "Ớ" => "O", "Ờ" => "O", "Ở" => "O", "Ỡ" => "O", "Ợ" => "O",
            "Ố" => "O", "Ồ" => "O", "Ổ" => "O", "Ỗ" => "O", "Ộ" => "O",
            "Ú" => "U", "Ù" => "U", "Ủ" => "U", "Ũ" => "U", "Ụ" => "U",
            "Ứ" => "U", "Ừ" => "U", "Ử" => "U", "Ữ" => "U", "Ự" => "U",);

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