@extends('layouts.homemaster')

@section('title', 'Blog Home')

@section('menu-category')
    @foreach($listCategory as $category)
        <li>
            <a href="/{{ $category["category_alias"] }}">{{ $category["category_name"] }}</a>
        </li>
    @endforeach
@endsection

@section('category')
    {{ isset($category_name) ? $category_name : "" }}
@endsection

@section('articles')
    <div class="text-center">
        <label align="center">{{ isset($message) ? $message : "" }}</label>
    </div>

    @foreach($listArticle as $article)
        <h2>
            <a href="/{{ \App\Article::find($article["id"])->category["category_alias"] }}/{{$article["alias"] }}.html">{{ $article["title"] }}</a>
        </h2>
        <p class="lead">
            by <label class="control-label">{{ $article["author"] }}</label>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Đăng
            lúc {{ date('H:i:s', strtotime($article["created_date"]))." thứ ".date('l', strtotime($article["created_date"])).",
            ngày ".date('d', strtotime($article["created_date"]))." tháng ".date('m', strtotime($article["created_date"]))."
            năm ".date('Y', strtotime($article["created_date"])) }}
        </p>
        <hr>
        <img class="img-responsive" src="http://placehold.it/500x300" alt="">
        <hr>
        <p>{{ $article["summary"] }}</p>
        <a class="btn btn-primary" href="/{{ \App\Article::find($article["id"])->category["category_alias"] }}/{{$article["alias"] }}.html">Xem thêm... <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>
    @endforeach
@endsection

@section('pager')
    {!! $listArticle->links() !!}
@endsection