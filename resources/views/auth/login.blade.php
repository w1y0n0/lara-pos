<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $setting->nama_perusahaan }} | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Favicons -->
    <link rel="icon" href="{{ url($setting->path_logo) }}" type="image/png">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('Dashboard/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('Dashboard/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('Dashboard/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('Dashboard/dist/css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('Dashboard/plugins/iCheck/square/blue.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Custom CSS -->
    <style>
        /* Tombol close */
        .custom-close {
            color: white;
            /* Warna putih */
            font-size: 24px;
            /* Ukuran font lebih besar */
            opacity: 1;
            /* Pastikan tombol terlihat sepenuhnya */
        }

        /* Hover effect untuk tombol close */
        .custom-close:hover {
            color: #ddd;
            /* Warna saat mouse hover */
        }

        /* Untuk memastikan ikon x tetap terlihat putih */
        .custom-close span {
            color: inherit;
            /* Warna mengikuti tombol */
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <center>
                <a href="{{ url('#') }}"><img src="{{ url($setting->path_logo) }}" class="img-responsive"
                        style="max-width: 100px;" alt="Logo"></a>
            </center>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg"><strong>{{ $setting->nama_perusahaan }}</strong></p>

            @if (session('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close custom-close" data-dismiss="alert" aria-hidden="true">
                        <span>×</span>
                    </button>
                    <h4><i class="icon fa fa-info"></i> Berhasil logout!</h4>
                    {{ session('message') }}
                </div>
            @else
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close custom-close" data-dismiss="alert" aria-hidden="true">
                        <span>×</span>
                    </button>
                    <h4><i class="icon fa fa-bullhorn"></i> Selamat datang!</h4>
                    Silahkan login terlebih dahulu.
                </div>
            @endif

            <form action="{{ route('login.proses') }}" method="post">
                @csrf
                <div class="form-group has-feedback @error('username') has-error @enderror">
                    <input type="text" class="form-control" name="username" placeholder="Username"
                        value="{{ old('username') }}" autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group has-feedback @error('password') has-error @enderror">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">LOGIN</button>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="{{ asset('Dashboard/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('Dashboard/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('Dashboard/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>
