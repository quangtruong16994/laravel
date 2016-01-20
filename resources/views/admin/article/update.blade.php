@extends('admin.article.new')

@section('title', 'Sửa bài viết')

@section('box-name', 'Sửa bài viết')

@section('action', '/admin/article/update')


@section('id')
    <input type="hidden" name="id" value="{{ $article["id"] }}">
@endsection


@section('article-title')
    {{ $article["title"] }}
@endsection


@section('article-summary')
    {{ $article["summary"] }}
@endsection


@section('article-content')
    {{ $article["content"] }}
@endsection


@section('article-category')
    <?php
        $category = $article["category_id"];
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
            var category = "<?php echo $category ?>";
            document.getElementById("slcCategory").selectedIndex = category;
        });
    </script>
@endsection


@section('article-author')
    {{ $article["author"] }}
@endsection


@section('btnAE')
    Sửa bài viết
@endsection


@section('btnReset')

@endsection