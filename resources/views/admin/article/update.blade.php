@extends('admin.article.new')

@section('title', 'Sửa bài viết')

@section('box-name', 'Sửa bài viết')

@section('action', '/admin/article/update')


@section('id')
    <input type="hidden" name="id" id="articleId" value="{{ $article["id"] }}">
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


@section('article-category-new')
    <?php $category = $article["category_id"] ?>
    <script type="text/javascript">
        $(document).ready(function () {
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


@section('btnAEAjax')
    <button class="btn btn-success" type="submit" name="btnAddAjax"
            onclick="getContent(); updateAjax()">Sửa bài viết Ajax</button>
@endsection


@section('updateAjax')
    <script language="javascript">
        function updateAjax() {
            event.preventDefault();

            var id = $('#articleId').val();
            var title = $('#title').val();
            var summary = $('#summary').val();
            var content = $('#articleContent').val();
            var category = $('#slcCategory').val();
            var author = $('#author').val();
            var token = $('#token').val();


            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "timeOut": "5000",
                "positionClass": "toast-top-right",
                "progressBar": true,
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/admin/article/updateAjax',
                type: "POST",
                data: {
                    id: id,
                    title: title,
                    summary: summary,
                    content: content,
                    category: category,
                    author: author
                },
                success: function (data) {
                    toastr["success"]("Sửa bài viết thành công!");
                    $('#listArticle').html(data);
                },
                fail: function(data) {
                    toastr["error"]("Không thể sửa bài viết!");
                }
            });
        }
    </script>
@endsection


@section('btnReset')

@endsection