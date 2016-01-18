@extends('layouts.master')

@section('title', 'Quản lý bài viết')

@section('user', Auth::user()["fullname"])

@section('active-menu', 'class="active"')

@section('content')
    <div class="row">
        <div id="breadcrumb" class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="/">Trang chủ</a></li>
                <li><a href="/article">Quản lý bài viết</a></li>
            </ol>
        </div>
    </div>

    <a href="/article/new" class="btn btn-default" style="margin: 0 0 10px 0;">Thêm bài viết</a>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-name">
                        <i class="fa fa-usd"></i> <span>Quản lý bài viết</span>
                    </div>
                    <div class="box-icons">
                        <a class="collapse-link"> <i class="fa fa-chevron-up"></i>
                        </a> <a class="expand-link"> <i class="fa fa-expand"></i>
                        </a> <a class="close-link"> <i class="fa fa-times"></i>
                        </a>
                    </div>
                    <div class="no-move"></div>
                </div>
                <div class="box-content no-padding">
                    <table class="table table-bordered table-striped table-hover table-heading table-datatable"
                           id="accountTable">
                        <thead>
                        <tr>
                            <th class="th center">STT</th>
                            <th class="th center">Tiêu đề</th>
                            <th class="th center">Tác giả</th>
                            <th class="th center">Chuyên mục</th>
                            <th class="th center">Trạng thái</th>
                            <th colspan="2" class="th center">---</th>
                        </tr>
                        </thead>
                        <tbody>
                        <div class="articles">
                            @include('article.articles')
                        </div>
                        {{--@foreach ($listArticle as $article)
                            <tr>
                                <td class="center">{{ $article["id"] }}</td>
                                <td>{{ $article["title"] }}</td>
                                <td>{{ $article["author"] }}</td>
                                <td>{{ $arti = App\Article::find($article["id"])->category["category_name"] }}</td>
                                <td>{{ $article["status"] ? "Active" : "Deactive" }}</td>
                                <td class="center">
                                    <form name="editarticle" action="article/edit" method="post">
                                        <input type="hidden" name="id" value="{{ $article["id"] }}">
                                        <button class="btn btn-primary" type="submit" name="btnEdit">Sửa</button>
                                    </form>
                                </td>
                                <td class="center">
                                    <form name="deletearticle" action="article/delete" method="post">
                                        <input type="hidden" name="id" value="{{ $article["id"] }}">
                                        <button class="btn btn-danger" type="submit" name="btnDelete">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach--}}
                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="th center">STT</th>
                            <th class="th center">Tiêu đề</th>
                            <th class="th center">Tác giả</th>
                            <th class="th center">Chuyên mục</th>
                            <th class="th center">Trạng thái</th>
                            <th class="th center">Sửa</th>
                            <th class="th center">Xóa</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                    getArticles(page);
                }
            }
        });

        $(document).ready(function() {
            $(document).on('click', '.pagination a', function (e) {
                getPosts($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });
        });

        function getArticles(page) {
            $.ajax({
                url : '?page=' + page,
                dataType: 'json',
            }).done(function (data) {
                $('.posts').html(data);
                location.hash = page;
            }).fail(function () {
                alert('Posts could not be loaded.');
            });
        }
    </script>

    @yield('update-modal')
@endsection