@foreach ($articles as $article)
    <tr>
        <td class="center">{{ $article["id"] }}</td>
        <td>{{ $article["title"] }}</td>
        <td>{{ $article["author"] }}</td>
        <td>{{ $arti = App\Article::find($article["id"])->category["category_name"] }}</td>
        <td>{{ $article["status"] ? "Active" : "Deactive" }}</td>
        <td class="center">
            <form name="editarticle" action="article/edit" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="id" value="{{ $article["id"] }}">
                <button class="btn btn-primary" type="submit" name="btnEdit">Sửa</button>
            </form>
        </td>
        <td class="center">
            <form name="deletearticle" action="article/delete" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="id" value="{{ $article["id"] }}">
                <button class="btn btn-danger" type="submit" name="btnDelete">Xóa</button>
            </form>
        </td>
    </tr>
@endforeach

{{ $articles->links() }}