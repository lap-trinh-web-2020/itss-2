<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB管理者-ログイン</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{asset('/admin/css/sb-admin.css')}}" rel="stylesheet">

</head>

<body class="bg-dark">

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">パスワードを変更する</div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputEmail" class="form-control" placeholder="現在のパスワード" required="required" autofocus="autofocus">
                        <label for="inputEmail">現在のパスワード</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="新しいパスワード" required="required">
                        <label for="inputPassword">新しいパスワード</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="パスワードを認証する" required="required">
                        <label for="inputPassword">パスワードを認証する</label>
                    </div>
                </div>
                <a class="btn btn-primary btn-block" href="index.html">送ります</a>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('/admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

</body>

</html>
