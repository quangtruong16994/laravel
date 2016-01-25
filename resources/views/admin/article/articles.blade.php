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
                       id="articleTable">
                    <thead>
                    <tr>
                        <th class="th center" style="width: 7%">ID</th>
                        <th class="th center" style="width: 50%">Tiêu đề</th>
                        <th class="th center" style="width: 10%">Tác giả</th>
                        <th class="th center" style="width: 13%">Chuyên mục</th>
                        <th class="th center" style="width: 10%">Trạng thái</th>
                        <th colspan="3" class="th center" style="width: 20%">---</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td class="center">{{ $article["id"] }}</td>
                            <td class="tdtitle"><label class="title">{{ $article["title"] }}</label></td>
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
                            <td class="center" colspan="2">
                                <form name="deletearticle" action="/admin/article/delete" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                    <input type="hidden" name="id" id="articleId" value="{{ $article["id"] }}">
                                    <button class="btn btn-danger" type="submit" name="btnDelete">Xóa</button>
                                    <button class="btn btn-danger" type="submit" name="btnDeleteAjax"
                                            onclick="deleteAjax({{ $article["id"] }})">Xóa Ajax
                                    </button>
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

<div id="mess">

</div>

<script language="javascript">
    function deleteAjax(id) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admin/article/deleteAjax',
            type: "POST",
            dataType: 'json',
            data: {
                id: id
            },
            success: function (data) {
                alert("Xóa thành công.");
                $('#listArticle').html(data);
                console.log(data);
            }
        });
    }

    $(document).ready(function () {
        $(function () {
            //Loop through all Labels with class 'title'.
            $(".title").each(function () {
                //Reference the Label.
                var label = $(this);

                //Add a Textarea next to the Label.
                label.after("<textarea cols=35 rows=3 style='display:none; padding: 3px; margin-right: 10px;'></textarea>");

                //Reference the Textarea.
                var textarea = $(this).next();

                //Set the name attribute of the Textarea.
                var id = this.id.split('_')[this.id.split('_').length - 1];
                textarea[0].name = id.replace("lbl", "txt");

                //Assign the value of Label to Textarea.
                textarea.val(label.html());

                var parent = $(this).parent().parent();
                var btn = document.createElement("BUTTON");        // Create a <button> element
                var btnText = document.createTextNode("Sửa");       // Create a text node
                btn.className = "btn btn-primary btnUpdateTitle";
                btn.style.marginLeft = "10px";
                btn.style.marginTop = "20px";
                btn.onclick = function () {

                }
                btn.appendChild(btnText);                                // Append the text to <button>


                //When Label is clicked, hide Label and show Textarea.
                label.dblclick(function () {
                    $(this).hide();
                    $(this).next().show();
                    $(this).next().focus();
                    $(parent).find('.tdtitle').append(btn);
                });

                //When focus is lost from Textarea, hide Textarea and show Label.
                textarea.focusout(function () {
                    $(this).hide();
                    $(this).prev().html($(this).val());
                    $(this).prev().show();
                    $(parent).find('.tdtitle .btnUpdateTitle').remove();

                    var title = $(this).val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '/admin/article/updateTitle',
                        type: "POST",
                        data: {
                            id: $(parent).find('td:first').text(),
                            title: title
                        },
                        success: function (data) {
                            alert("Sửa tiêu đề thành công.");
                            $('#listArticle').html(data);
                            console.log(data);
                        }
                    });
                });
            });
        });


    });
</script>