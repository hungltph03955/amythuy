<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- <title>@yield('title')</title> -->
    <title>Admin AmyThuy</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/png" href="{{asset('endUser/images/icons/favicon.png')}}"/>
    <link rel="stylesheet" href="{{asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/dist/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{asset('public/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/bower_components/Ionicons/ionicons.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('public/bower_components/bootstrap-datepicker/css/bootstrap-datepicker.css')}}">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{asset('public/style.css')}}">

    <script src="{{asset('public/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('public/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    @stack('styles')
    <style>
        .wrapper {
            display: none;
            /*opacity: 0.5;*/
        }

        .preload {
            margin: 0px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">


<div class="preload">
    <img src="{{asset('public/image/35.gif')}}">
</div>

<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="/admin" class="logo">
            <span class="logo-mini"><b>AmyThuy</b></span>
            <span class="logo-lg"><b>AmyThuy</b></span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('public/dist/img/user2-160x160.jpg')}}" class="user-image"
                                 alt="User Image">
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="{{asset('public/dist/img/user2-160x160.jpg')}}" class="img-circle"
                                     alt="User Image">

                                <p>{{Auth::user()->name}}
                                    <small>Since {{Auth::user()->created_at}}</small>
                                </p>
                            </li>
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="{{url('admin/product')}}">Sản Phẩm</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="{{url('admin/sale')}}">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="{{url('admin/order')}}">Order</a>
                                    </div>
                                </div>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ url('admin/users/edit/'.Auth::user()->id) }}"
                                       class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li> -->
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('public/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            {{--<li><a href="{{url('admin/sale')}}"><i class="fa fa-circle-o"></i> Sale</a></li>--}}
            {{--<li><a href="{{url('admin/image')}}"><i class="fa fa-circle-o"></i> Image</a></li>--}}
            {{--<li><a href="{{url('admin/customer')}}"><i class="fa fa-circle-o"></i> Customer</a></li>--}}
            {{--<li><a href="{{url('admin/information')}}"><i class="fa fa-circle-o"></i> Information</a></li>--}}
            {{--<li><a href="{{url('admin/order')}}"><i class="fa fa-circle-o"></i> Order</a></li>--}}

            {{--<li><a href="{{url('admin/imagebanner')}}"><i class="fa fa-circle-o"></i> Image Banner </a></li>--}}


            <ul class="sidebar-menu" data-widget="tree">
                <li>
                    <a href="{{url('admin/')}}"><i class="fa fa-circle-o"></i>Trảng chủ</a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Danh mục sản phẩm</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                        <li><a href="{{url('admin/category')}}"><i class="fa fa-circle-o"></i> Danh sách</a>
                        <li><a href="{{ action('Admin\CategoryController@create') }}"><i class="fa fa-circle-o"></i>Thêm
                                danh mục sản phẩm</a>
                        </li>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Sản phẩm</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                        <li><a href="{{url('admin/product')}}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
                        <li><a href="{{ action('Admin\ProductController@create') }}"><i class="fa fa-circle-o"></i>Thêm
                                sản phẩm</a></li>
                        </li>
                    </ul>
                </li>
                <li><a href="{{url('admin/sale')}}"><i class="fa fa-folder"></i> Sale</a></li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Đơn hàng</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                        <li><a href="{{url('admin/order')}}"><i class="fa fa-circle-o"></i>Danh sách đơn hàng</a></li>
                        </li>
                    </ul>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Phụ lục sản phẩm</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                            <a href=""><i class="fa fa-circle-o"></i> Màu sắc
                                <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{url('admin/color/list')}}"><i class="fa fa-circle-o"></i>Danh
                                        sách
                                        màu sắc</a></li>
                                <li><a href="{{url('admin/color/add')}}"><i class="fa fa-circle-o"></i>Thêm màu
                                        sắc</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i> Kích cỡ
                                <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{url('admin/sizes/list')}}"><i class="fa fa-circle-o"></i>Danhz
                                        sách kích cỡ</a></li>
                                <li><a href="{{url('admin/sizes/add')}}"><i class="fa fa-circle-o"></i>Thêm kích
                                        cỡ</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i>Bộ sưu tập
                                <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{url('admin/collections/list')}}"><i class="fa fa-circle-o"></i>Danh
                                        sách bộ sưu tập</a></li>
                                <li><a href="{{url('admin/collections/add')}}"><i class="fa fa-circle-o"></i>Thêm
                                        bộ sưu tập</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i>Chất liệu
                                <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{url('admin/materials/list')}}"><i class="fa fa-circle-o"></i>Danh
                                        sách chất liệu</a></li>
                                <li><a href="{{url('admin/materials/add')}}"><i class="fa fa-circle-o"></i>Thêm
                                        chất liệu</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Tin tức</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                        <li><a href="{{action('Admin\NewController@getNewsList')}}"><i class="fa fa-circle-o"></i>Danh
                                sách</a></li>
                        <li><a href="{{ action('Admin\NewController@getNewsAdd') }}"><i class="fa fa-circle-o"></i>Thêm
                                tin tức</a></li>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Ảnh banner</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                        <li><a href="{{action('Admin\ImagebannerController@index')}}"><i
                                        class="fa fa-circle-o"></i>Danh
                                sách</a></li>
                        <li><a href="{{ action('Admin\ImagebannerController@create') }}"><i
                                        class="fa fa-circle-o"></i>Thêm
                                ảnh</a></li>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Liên hệ phản hồi</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                        <li><a href="{{action('Admin\InformationController@index')}}"><i
                                        class="fa fa-circle-o"></i>Danh
                                sách</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Giới thiệu thông tin</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                        <li><a href="{{action('Admin\AboutController@getAboutAdd')}}"><i
                                        class="fa fa-circle-o"></i>Giới thiệu</a></li>
                    </ul>
                </li>


                @if (Auth::user()->roles === 1)
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i> <span>Quản lý người dùng</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                            <li><a href="{{action('Admin\UserController@getUsersList')}}"><i
                                            class="fa fa-circle-o"></i>Danh
                                    sách</a></li>
                            <li><a href="{{action('Admin\UserController@getUsersAdd')}}"><i
                                            class="fa fa-circle-o"></i>Thêm quản trị</a></li>
                        </ul>
                    </li>
                @endif

            </ul>
        </section>
    </aside>

    <div class="content-wrapper">
        <section class="content">
            @if (Session::has('responseData'))
                @if (Session::get('responseData')['statusCode'] == 1)
                    <div class="alert alert-success gennerError">{{ Session::get('responseData')['message'] }}</div>
                @elseif (Session::get('responseData')['statusCode'] == 2)
                    <div class="alert alert-danger gennerError">{{ Session::get('responseData')['message'] }}</div>
                @endif
            @endif
            @if ($message = Session::get('success'))

                <div class="alert alert-success success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @yield('content')
        </section>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2018 <a href="{{route('homepage.index')}}">AmyThuy.</a></strong>
    </footer>
    @include('element.sidebar')
    <div class="control-sidebar-bg"></div>
</div>


<script src="{{asset('public/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('public/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('public/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('public/dist/js/demo.js')}}"></script>
<script src="{{asset('js/myScript.js')}}"></script>
<script src="{{asset('public/bower_components/ckeditor/ckeditor.js')}}"></script>


<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
</script>
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
<script>
    $(function () {
        $(".preload").fadeOut(200, function () {
            $(".wrapper").fadeIn(300);
        })
    })
</script>

@stack('scripts')
</body>
</html>
