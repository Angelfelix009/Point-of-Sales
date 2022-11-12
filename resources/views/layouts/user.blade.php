<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>::Navigand Point of Sale System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/png" href="{{asset('public/images/logo/icon.png')}}"/>
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('public/scripts_lib/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/font-awesome/css/font-awesome.min.css')}}" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('public/dist/css/skins/_all-skins.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('public/plugins/iCheck/flat/blue.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('public/plugins/morris/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('public/plugins/datepicker/datepicker3.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('public/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="/dashboard" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>P</b>OS</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Staff </b>Dashboard</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </button>
                Navigand
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(Auth::user()->profile_photo_path!=NULL)
                                Welcome  <img src="{{asset('storage/app/public/staffs/'.Auth::user()->id.'/'. Auth::user()->profile_photo_path)}}" width="30" height="30" class="img-circle">
                            @else
                                <span class="hidden-xs">{{Auth::user()->email}}  </span>
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li><h4>Welcome</h4></li>
                            <li><a href=""><span class="fa fa-user"></span>Edit Profile</a></li>
                            <li><a href="{{route('change-password')}}"><span class="fa fa-gear"></span>Change Password</a></li>
                            <li> <a class="dropdown-item" href=""
                                    onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                                    <span class="fa fa-power-off"></span> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
@include('inc._sidebar')
@yield('content')
<!-- Content Wrapper. Contains page content -->
    <!-- /.content-wrapper -->
    <footer class="main-footer text-center">
        <strong class="text-center">Copyright &copy; Navigand Limited 2020 .</strong> All rights
        reserved.
    </footer>

    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('public/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script src="{{asset('public/plugins/jQuery/jquery.validate.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('public/scripts_lib/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('public/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/plugins/knob/jquery.knob.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('public/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('public/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('public/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/dist/js/app.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/dist/js/demo.js')}}"></script>
<script type="text/javascript">
    $('#intervalbtn').click(function(){
        $('#single').hide();
        $('#interval').show();
    });
    $('#singlebtn').click(function(){
        $('#interval').hide();
        $('#single').show();
    });
    $('#good_name').on('keyup',function(){
        $value=$(this).val();
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        $ref = urlParams.get('ref');
        $.ajax({
            type : 'get',
            url : '{{URL::to('find-product')}}',
            data:{'name':$value,'ref':$ref},
            success:function(data){
                $('tbody').html(data);
            }
        });
    })
</script>
</body>
</html>
