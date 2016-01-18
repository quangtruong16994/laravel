<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset("public/css/bootstrap.min.css") }}">

    <link rel="stylesheet" href="{{ asset("public/css/styleads.css") }}">
</head>
<body>
<div class="container-fluid">
    <div id="page-login" class="row">
        <div id="message"></div>
        <div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <div class="box">
                <div class="box-content">
                    <div class="text-center">
                        <h3 class="page-header">Đăng nhập</h3>
                    </div>
                    <form id="login-form" action="/Laravel/login" method="post">
                        <div class="form-group">
                            <label class="control-label">Email: </label> <input type="text" class="form-control"
                                                                                        name="email"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mật khẩu: </label> <input type="password" class="form-control"
                                                                                   name="password"/>
                        </div>
                        <div class="text-center">
                            <button id="login-button" type="submit" class="btn btn-primary">
                                Đăng nhập
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>