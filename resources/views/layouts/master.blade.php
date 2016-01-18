<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">

    <link rel="stylesheet" href="{{ asset("css/font-awesome.css") }}">

    <link rel="stylesheet" href="{{ asset("css/admin.css") }}">

    <script src="public/js/jquery.min.js"></script>
</head>
<body>
<!--Start Header-->
<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">
            <div id="logo" class="col-xs-12 col-sm-2">
                <a href="/">Quang Truong</a>
            </div>
            <div id="top-panel" class="col-xs-12 col-sm-10">
                <div class="row">
                    <div class="col-xs-8 col-sm-4">
                        <a href="#" class="show-sidebar"> <i class="fa fa-bars"></i>
                        </a>
                        <div id="search">
                            <input type="text" placeholder="search"/> <i class="fa fa-search"></i>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-8 top-panel-right">
                        <ul class="nav navbar-nav pull-right panel-menu">

                            <li class="dropdown"><a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                                    <div class="avatar">
                                        <img src="{{ asset("imgs/avatar.jpg") }}"
                                             class="img-rounded" alt="avatar"/>
                                    </div>
                                    <i class="fa fa-angle-down pull-right"></i>
                                    <div class="user-mini pull-right">
                                        <span class="welcome">Chào,</span> <span>@yield('user')</span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"> <i class="fa fa-user"></i> <span>Thông tin cá nhân</span>
                                        </a></li>
                                    <li><a href="ajax/page_messages.html" class="ajax-link"> <i
                                                    class="fa fa-envelope"></i> <span>Tin
													nhắn</span>
                                        </a></li>
                                    <li><a href="ajax/gallery_simple.html" class="ajax-link"> <i
                                                    class="fa fa-picture-o"></i> <span>Albums</span>
                                        </a></li>
                                    <li><a href="ajax/calendar.html" class="ajax-link"> <i class="fa fa-tasks"></i>
                                            <span>Tasks</span>
                                        </a></li>
                                    <li><a href="#"> <i class="fa fa-power-off"></i> <span>Đăng xuất</span>
                                        </a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--End Header-->

<!--Start Container-->
<div id="main" class="container-fluid">
    <div class="row">
        <div id="sidebar-left" class="col-xs-2 col-sm-2">
            <ul class="nav main-menu">
                <li><a href="/"> <i class="fa fa-dashboard"></i> <span
                                class="hidden-xs"
                        >Trang chủ</span>
                    </a></li>

                <li><a href="/user"> <i class="fa fa-table"></i> <span
                                class="hidden-xs"
                        >Quản lý tài khoản</span>
                    </a>
                </li>
                <li><a href="/article"> <i
                                class="fa fa-table"></i> <span
                                class="hidden-xs"
                        >Quản lý bài viết</span>
                    </a>
                </li>
            </ul>
        </div>

        <!--Start Content-->
        <div id="content" class="col-xs-12 col-sm-10">
            @yield('content')
        </div>
        <!--End Content-->
    </div>
</div>
<!--End Container-->

<a href="#" class="scrollToTop" style="float: right;">Lên đầu trang</a>

<script src="{{ asset("js/jquery.min.js") }}"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset("js/bootstrap.min.js") }}"></script>

<!-- All functions for this theme + document.ready processing -->
<script src="{{ asset("js/devoops.js") }}"></script>

<script src="{{ asset("js/jquery.dataTables.min.js") }}"></script>

</body>
</html>
