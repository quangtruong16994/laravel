@extends('layouts.homemaster')

@section('title', $article["title"] )

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
        <label align="center">{{ isset($mess) ? $mess : "" }}</label>
    </div>

    <h2>
        {{ $article["title"] }}
    </h2>
    <p class="lead">
        by <label class="control-label">{{ $article["author"] }}</label>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Đăng
        lúc {{ date('H:i:s', strtotime($article["created_date"]))." thứ ".date('l', strtotime($article["created_date"])).",
            ngày ".date('d', strtotime($article["created_date"]))." tháng ".date('m', strtotime($article["created_date"]))."
            năm ".date('Y', strtotime($article["created_date"])) }}
    </p>
    <p><strong>{{ $article["summary"] }}</strong></p>
    <hr>
    <div class="contentArticle">
        <p>{!! htmlspecialchars_decode($article["content"]) !!}</p>
    </div>
    <hr>
@endsection

@section('relateArticle')
    <h4>Có thể bạn quan tâm</h4>
    <ul class="list-unstyled">
        @foreach($relateArticles as $article)
            <li><a href="/{{ \App\Article::find($article["id"])->category["category_alias"] }}/{{$article["alias"] }}.html">- {{ $article["title"] }}</a></li>
        @endforeach
    </ul>
@endsection