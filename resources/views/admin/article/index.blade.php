@extends('layouts.master')

@section('title', 'Quản lý bài viết')

@section('user', Auth::user()["fullname"])

@section('active-menu', 'class="active"')

@section('content')
    <div class="row">
        <div id="breadcrumb" class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="/admin/">Trang chủ</a></li>
                <li><a href="/admin/article">Quản lý bài viết</a></li>
            </ol>
        </div>
    </div>

    <a href="/admin/article/new" class="btn btn-default" style="margin: 0 0 10px 0;">Thêm bài viết</a>

    <div id="listArticle">
        @include('admin.article.articles')
    </div>

    <script>
        /*$(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                    getArticles(page);
                }
            }
        });*/
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function (e) {
                getArticles($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });
        });
        function getArticles(page) {
            $.ajax({
                url : '?page=' + page,
                dataType: 'json',
            }).done(function (data) {
                $('#listArticle').html(data);
            }).fail(function () {
                alert('Could not be loaded.');
            });
        }
    </script>

    @yield('update-modal')
@endsection