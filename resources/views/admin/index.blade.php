@extends('layouts.master')

@section('title', 'Trang chủ')

@section('user', Auth::user()["fullname"])

@section('active-menu-home', 'class="active"')

@section('checkSwitchCache')
    <?php $cache = include("../config/cache.php");
    ?>
    {{ $cache["default"] == "redis" ? "checked" : "" }}
@endsection

@section('switchCache')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#switchCache').click(function() {
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
                    url: '/admin/switchCache',
                    type: "POST",
                    success: function (data) {
                        toastr["success"]("Switch thành công!");
                    },
                    fail: function(data) {
                        toastr["error"]("Chưa switch được!");
                    }
                });
            });
        });
    </script>
@endsection