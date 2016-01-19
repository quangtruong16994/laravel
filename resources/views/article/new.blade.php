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
                <li><a href="/article/new">Thêm bài viết</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-name">
                        <i class="fa fa-search"></i>
                        <span>Thêm bài viết</span>
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
                    <form class="form-horizontal" role="form" name="frmAddArticle" action="/article/add" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tiêu đề</label>
                            <div class="col-sm-4">
                                <textarea name="title" class="form-control" placeholder="Tiêu đề" data-toggle="tooltip"
                                          data-placement="bottom" title="Tiêu đề"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tóm lược</label>
                            <div class="col-sm-6">
                                <textarea name="summary" class="form-control" placeholder="Tóm lược"
                                          data-toggle="tooltip" data-placement="bottom" title="Tóm lược"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nội dung</label>
                            <div class="col-sm-10">
                                <script language="javascript" src="{{ asset("ckeditor/ckeditor.js") }}"
                                        type="text/javascript"></script>
                                <textarea class="form-control" id="areaContent" name="areaContent"></textarea>
                                <input type="hidden" id="articleContent" name="articleContent" value="">
                                <script type="text/javascript">
                                    CKEDITOR.replace("areaContent", CKEDITOR.config.allowedContent=true);
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
                                <select name="category" class="form-control">
                                    <option value="0">---- Chuyên mục ---</option>
                                    <?php
                                        $category = new \App\Category();
                                        $list = $category->all()->toArray();
                                    ?>
                                    @foreach($list as $cat)
                                        <option value="{{ $cat["id"] }}">{{ $cat["category_name"] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tác giả</label>
                            <div class="col-sm-3">
                                <input type="text" name="author" rows="5" class="form-control" placeholder="Tác giả"
                                       data-toggle="tooltip" data-placement="bottom" title="Tác giả">
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success" type="submit" name="btnAdd" onClick="getContent()">Thêm bài viết</button>
                            <button class="btn btn-default" type="reset" name="btnReset">Nhập lại</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection