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
                        <th class="th center" style="width: 7%">STT</th>
                        <th class="th center" style="width: 50%">Tiêu đề</th>
                        <th class="th center" style="width: 10%">Tác giả</th>
                        <th class="th center" style="width: 13%">Chuyên mục</th>
                        <th class="th center" style="width: 10%">Trạng thái</th>
                        <th colspan="2" class="th center" style="width: 10%">---</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td class="center">{{ $article["id"] }}</td>
                            <td>{{ $article["title"] }}</td>
                            <td>{{ $article["author"] }}</td>
                            <td>{{ $arti = App\Article::find($article["id"])->category["category_name"] }}</td>
                            <td>{{ $article["status"] ? "Active" : "Deactive" }}</td>
                            <td class="center">
                                <form name="editarticle" action="/admin/article/edit" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                    <input type="hidden" name="id" value="{{ $article["id"] }}">
                                    <button class="btn btn-primary" type="submit" name="btnEdit">Sửa</button>
                                </form>
                            </td>
                            <td class="center">
                                <form name="deletearticle" action="/admin/article/delete" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                    <input type="hidden" name="id" value="{{ $article["id"] }}">
                                    <button class="btn btn-danger" type="submit" name="btnDelete">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
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
                <div style="float: right; margin-right: 20px;">{{ $articles->links() }}</div>
            </div>
        </div>
    </div>
</div>