@extends('layouts.master')

@section('title', 'Quản lý tài khoản')

@section('user', Auth::user()["fullname"])

@section('active-menu', 'class="active"')

@section('content')
    <div class="row">
        <div id="breadcrumb" class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="/admin/">Trang chủ</a></li>
                <li><a href="/admin/user">Quản lý tài khoản</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-name">
                        <i class="fa fa-usd"></i> <span>Quản lý tài khoản người dùng</span>
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
                            <th class="th center">ID</th>
                            <th class="th center">Tên đăng nhập</th>
                            <th class="th center">Hộp thư</th>
                            <th class="th center">Họ tên</th>
                            <th class="th center">Số điện thoại</th>
                            <th class="th center">Địa chỉ</th>
                            <th colspan="2" class="th center">---</th>
                            {{--                            <th class="th center">Xem</th>
                                                        <th class="th center">Sửa</th>
                                                        <th class="th center">Xóa</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($listUser as $user)
                            <tr>
                                <td class="center">{{ $user["id"] }}</td>
                                <td>{{ $user["username"] }}</td>
                                <td>{{ $user["email"] }}</td>
                                <td>{{ $user["fullname"] }}</td>
                                <td>{{ $user["phone"] }}</td>
                                <td>{{ $user["address"] }}</td>
                                <td class="center">
                                    <form name="editUser" action="/admin/user/edit" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="id" value="{{ $user["id"] }}">
                                        <button class="btn btn-primary" type="submit" name="btnEdit">Sửa</button>
                                    </form>
                                </td>
                                <td class="center">
                                    <form name="deleteUser" action="/admin/user/delete" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="id" value="{{ $user["id"] }}">
                                        <button class="btn btn-danger" type="submit" name="btnDelete">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="th center">ID</th>
                            <th class="th center">Tên đăng nhập</th>
                            <th class="th center">Hộp thư</th>
                            <th class="th center">Họ tên</th>
                            <th class="th center">Số điện thoại</th>
                            <th class="th center">Địa chỉ</th>
                            <th class="th center">Sửa</th>
                            <th class="th center">Xóa</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @yield('update-modal')
@endsection