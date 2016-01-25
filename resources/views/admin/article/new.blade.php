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
                <li><a href="/admin/article/new">Thêm bài viết</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-name">
                        <i class="fa fa-search"></i>
                        <span>@yield('box-name', 'Thêm bài viết')</span>
                    </div>
                    <div class="box-icons">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="expand-link">
                            <i class="fa fa-expand"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                    <div class="no-move"></div>
                </div>
                <div class="box-content">
                    <form class="form-horizontal" role="form" id="addAticle" name="frmAddArticle"
                          action="@yield('action', '/admin/article/add')" method="post">
                        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}"/>
                        @yield('id')
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tiêu đề</label>
                            <div class="col-sm-4">
                                <textarea name="title" id="title" class="form-control" placeholder="Tiêu đề"
                                          data-toggle="tooltip"
                                          data-placement="bottom"
                                          title="Tiêu đề">@yield('article-title'){{ old('title') }}</textarea>
                            </div>
                            <label class="col-sm-4 control-label" style="text-align: left">
                                @if(count($errors) > 0)
                                    @foreach ($errors->get('title') as $messages)
                                        {{ $messages }}
                                    @endforeach
                                @endif
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tóm lược</label>
                            <div class="col-sm-6">
                                <textarea name="summary" id="summary" class="form-control" placeholder="Tóm lược"
                                          data-toggle="tooltip" data-placement="bottom"
                                          title="Tóm lược">@yield('article-summary'){{ old('summary') }}</textarea>
                            </div>
                            <label class="col-sm-4 control-label" style="text-align: left">
                                @if(count($errors) > 0)
                                    @foreach ($errors->get('summary') as $messages)
                                        {{ $messages }}
                                    @endforeach
                                @endif
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nội dung</label>
                            <div class="col-sm-10">
                                <script language="javascript" src="{{ asset("ckeditor/ckeditor.js") }}"
                                        type="text/javascript"></script>
                                <textarea class="form-control" id="areaContent"
                                          name="areaContent">@yield('article-content'){{ old('articleContent') }}</textarea>
                                <input type="hidden" id="articleContent" name="articleContent" value="">
                                <script type="text/javascript">
                                    CKEDITOR.replace("areaContent", CKEDITOR.config.allowedContent = true);
                                </script>
                                <script type="text/javascript">
                                    function getContent() {
                                        var content = CKEDITOR.instances.areaContent.getData();
                                        document.getElementById("articleContent").value = content;
                                    }
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Chuyên mục</label>
                            <div class="col-sm-3">
                                <select id="slcCategory" name="category" class="form-control">
                                    <option value="0">---- Chuyên mục ---</option>
                                    <?php
                                    $category = new \App\Category();
                                    $list = $category->all()->toArray();
                                    ?>
                                    @foreach($list as $cat)
                                        <option value="{{ $cat["id"] }}">{{ $cat["category_name"] }}</option>
                                    @endforeach
                                </select>

                                @section('article-category-new')
                                    <?php $category = old('category'); ?>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            var category = "<?php echo $category ?>";
                                            document.getElementById("slcCategory").selectedIndex = category;
                                        });
                                    </script>
                                @stop
                                @yield('article-category-new')


                            </div>

                            <label class="col-sm-4 control-label" style="text-align: left">
                                @if(count($errors) > 0)
                                    @foreach ($errors->get('category') as $messages)
                                        {{ $messages }}
                                    @endforeach
                                @endif
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tác giả</label>
                            <div class="col-sm-3">
                                <input type="text" id="author" name="author" rows="5" class="form-control"
                                       placeholder="Tác giả"
                                       data-toggle="tooltip" data-placement="bottom" title="Tác giả"
                                       value="@yield('article-author'){{ old('author') }}">
                            </div>
                            <label class="col-sm-4 control-label" style="text-align: left">
                                @if(count($errors) > 0)
                                    @foreach ($errors->get('author') as $messages)
                                        {{ $messages }}
                                    @endforeach
                                @endif
                            </label>
                        </div>
                        <script language="javascript">
                            function addAjax() {
                                event.preventDefault();
                                var title = $('#title').val();
                                var summary = $('#summary').val();
                                var content = $('#articleContent').val();
                                var category = $('#slcCategory').val();
                                var author = $('#author').val();
                                var token = $('#token').val();

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    url: '/admin/article/addAjax',
                                    type: "POST",
                                    data: {
                                        title: title,
                                        summary: summary,
                                        content: content,
                                        category: category,
                                        author: author
                                    },
                                    success: function (data) {
                                        alert("Thêm thành công.");
                                        console.log(data);
                                    }
                                });
                            }
                        </script>
                        <div class="text-center">
                            <button class="btn btn-success" type="submit" name="btnAdd"
                                    onClick="getContent()">@yield('btnAE', 'Thêm bài viết')</button>

                            @yield('btnAEAjax', '<button class="btn btn-success" type="submit" name="btnAddAjax"
                                    onclick="getContent(); addAjax()">Thêm bài viết Ajax</button>')
                            @yield('btnReset', '<button class="btn btn-default" type="reset" name="btnReset">Nhập lại</button>')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection