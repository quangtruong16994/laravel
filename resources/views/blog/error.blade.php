@extends('layouts.homemaster')

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
@endsection