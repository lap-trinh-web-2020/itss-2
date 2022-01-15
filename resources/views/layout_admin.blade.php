<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HEDBLO Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ asset('/admin/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/admin/css/sb-admin.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href={{ URL::to('/home-page') }}>ホームページ</a>
        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw fa-2x"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ URL::to('users/' . auth()->user()->user_id) }}">プロフィール</a>
                    <a class="dropdown-item" href="{{ URL::to('logout') }}">ログアウト</a>
                </div>
            </li>
        </ul>

    </nav>

    <div id="wrapper">
        <!-- Sidebar Menu -->
        <div class="sidebar text-center">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('admin.users') }}" class="nav-link ">
                            <i class="nav-icon fas fa-users"></i>&nbsp;&nbsp;&nbsp;
                            <span>ユーザー</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.restaurants') }}" class="nav-link">
                            <i class="fa fa-utensils"></i>&nbsp;&nbsp;&nbsp;
                            <span>レストラン</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.posts') }}" class="nav-link">
                            <i class="nav-icon fas fa-list-alt"></i>&nbsp;&nbsp;&nbsp;
                            <span>投稿</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.tags') }}" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>&nbsp;&nbsp;&nbsp;
                            <span>タグ</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.products') }}" class="nav-link">
                            <i class="fa fa-mortar-pestle"></i>&nbsp;&nbsp;&nbsp;
                            <span>材料</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">出発する準備はできましたか？</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">現在のセッションを終了する準備ができている場合は、下の[ログアウト]を選択してください。</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
                    <a class="btn btn-primary" href="login.html">ログアウト</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('/admin/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/admin/vendor/datatables/dataTables.bootstrap4.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/admin/js/sb-admin.min.js"') }}"></script>

    <!-- Demo scripts for this page-->
    <script src="{{ asset(' /admin/js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('/admin/js/demo/chart-area-demo.js') }}"></script>

</body>

</html>
