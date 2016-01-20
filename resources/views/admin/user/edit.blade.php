@extends('admin.user.index')

@section('update-modal')
    <form name="frmUpdate" action="" method="post">
        <div class="modal fade" id="editForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="modalLabel">Sửa thông tin tài khoản</h4>
                    </div>

                    <div class="modal-body">
                        <label>Mã tài khoản:</label>
                        <div class="row">
                            <label class="lc">Tên đăng nhập </label> <label class="cc"></label> <label class="lc">Hộp
                                thư</label> <label class="cc"></label>
                        </div>
                        <div class="row">
                            <label class="lc">Họ tên</label> <input class="cc" type="text" name="txtFullname"
                                                                    value=""
                            /> <label class="lc">Ngày sinh</label> <input class="cc" type="text" name="txtBirthday"
                                                                          value=""
                            />
                        </div>
                        <div class="row">
                            <label class="lc">SĐT di động</label> <input class="cc" type="text" name="txtMobilePhone"
                                                                         value=""
                            /> <label class="lc">SĐT nhà riêng</label> <input class="cc" type="text" name="txtHomePhone"
                                                                              value=""
                            />
                        </div>
                        <div class="row">
                            <label class="lc">SĐT văn phòng</label> <input class="cc" type="text" name="txtOfficePhone"
                                                                           value=""
                            /> <label class="lc">Trạng thái</label>
                            <div class="toggle-switch toggle-switch-success" style="width: 110px;">
                                <label> <input type="checkbox" checked/>
                                    <div class="toggle-switch-inner"></div>
                                    <div class="toggle-switch-switch">
                                        <i class="fa fa-check"></i>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="lc">Địa chỉ</label> <input class="cc" type="text" name="txtAddress"
                                                                     value=""
                            />
                        </div>
                        <div class="row">
                            <label class="lc">Ngày tạo tài khoản</label> <input class="cc" type="text"
                                                                                name="txtCreatedDate"
                                                                                value=""
                            /> <label class="lc">Ngày sửa cuối</label> <input class="cc" type="text"
                                                                              name="txtLastModified"
                                                                              value=""
                            />
                        </div>
                        <div class="row">
                            <label class="lc">Quyền</label> <label class="cc"></label> <label class="lc">Vai
                                trò</label> <label class="cc"></label>
                        </div>
                        <div class="row">
                            <label class="lc">Thông tin khác</label>
                            <textarea class="cc" name="txtNotes"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection