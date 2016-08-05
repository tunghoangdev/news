<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Dashboard</title>
        <meta name="description" content="Dashboard" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="{!! asset('public/tdev_admin/assets/img/favicon.png') !!}" type="image/x-icon">
        <!--Basic Styles-->
        <link href="{!! asset('public/tdev_admin/assets/css/bootstrap.min.css') !!}" rel="stylesheet" />
        <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
        <link href="{!! asset('public/tdev_admin/assets/css/font-awesome.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('public/tdev_admin/assets/css/weather-icons.min.css') !!}" rel="stylesheet" />

        <!--Fonts-->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <!--Beyond styles-->
        <link id="beyond-link" href="{!! asset('public/tdev_admin/assets/css/beyond.min.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('public/tdev_admin/assets/css/demo.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('public/tdev_admin/assets/css/typicons.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('public/tdev_admin/assets/css/animate.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('public/tdev_admin/assets/css/dataTables.bootstrap.css') !!}" rel="stylesheet" />
    </head>
    <body>
    <form action="" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="login-container animated fadeInDown">
            @include('admin.alert.notify')
            <div class="loginbox bg-white">
                <div class="loginbox-title">SIGN IN</div>
                <div class="loginbox-social">
                    <div class="social-title ">Connect with Your Social Accounts</div>
                    <div class="social-buttons">
                        <a href="" class="button-facebook">
                            <i class="social-icon fa fa-facebook"></i>
                        </a>
                        <a href="" class="button-twitter">
                            <i class="social-icon fa fa-twitter"></i>
                        </a>
                        <a href="" class="button-google">
                            <i class="social-icon fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="loginbox-or">
                    <div class="or-line"></div>
                    <div class="or">OR</div>
                </div>
                <div class="loginbox-textbox">
                    <input name="txtUser" type="text" class="form-control" placeholder="Username" />
                </div>
                <div class="loginbox-textbox">
                    <input type="password" name="txtPass" class="form-control" placeholder="Password" />
                </div>
                <div class="loginbox-submit">
                    <input type="submit" class="btn btn-primary btn-block" value="Login">
                </div>
            </div>
        </div>
    </form>
    </body>
    <!--Basic Scripts-->
    <script src="{!! asset('public/tdev_admin/assets/js/jquery.min.js') !!}"></script>
    <script src="{!! asset('public/tdev_admin/assets/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('public/tdev_admin/assets/js/slimscroll/jquery.slimscroll.min.js') !!}"></script>
    <!--Beyond Scripts-->
    <script src="{!! asset('public/tdev_admin/assets/js/beyond.min.js') !!}"></script>
</html>
