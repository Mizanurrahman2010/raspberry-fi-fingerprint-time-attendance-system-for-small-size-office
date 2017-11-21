<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-Admin-v2.0/Admin/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Apr 2016 02:43:12 GMT -->
<head>
    <meta charset="utf-8" />
    <title>FPS Student | Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style-responsive.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/theme/default.css" rel="stylesheet') }}" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{{ asset('plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <link href="{{ asset('plugins/bootstrap-wizard/css/bwizard.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/parsley/src/parsley.css') }}" rel="stylesheet" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="{{ asset('css/ajaxapp.css') }}" rel="stylesheet"/>
    <!-- ================== END BASE CSS STYLE ================== -->

    <link href="{{ asset('css/student.custom.css') }}" rel="stylesheet"/>

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('plugins/pace/pace.min.js') }}"></script>
    <!-- ================== END BASE JS ================== -->
    <script src="{{ asset('plugins/jquery/jquery-1.9.1.min.js') }}"></script>

    <script>
        var HTTP_SERVER = "<?= url('/') ?>";
    </script>
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-without-sidebar page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin mobile sidebar expand / collapse button -->
            <div class="navbar-header">
                <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> FPS Student - University of Information Technology & Sciences</a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end mobile sidebar expand / collapse button -->

            <!-- begin header navigation right -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                        <i class="fa fa-bell-o"></i>
                        <span class="label">5</span>
                    </a>
                    <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                        <li class="dropdown-header">Notifications (5)</li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading">Server Error Reports</h6>
                                    <div class="text-muted f-s-11">3 minutes ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><img src="{{ asset('img/user-1.jpg') }}" class="media-object" alt="" /></div>
                                <div class="media-body">
                                    <h6 class="media-heading">John Smith</h6>
                                    <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                    <div class="text-muted f-s-11">25 minutes ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><img src="{{ asset('img/user-2.jpg') }}" class="media-object" alt="" /></div>
                                <div class="media-body">
                                    <h6 class="media-heading">Olivia</h6>
                                    <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                    <div class="text-muted f-s-11">35 minutes ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><i class="fa fa-plus media-object bg-green"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading"> New User Registered</h6>
                                    <div class="text-muted f-s-11">1 hour ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><i class="fa fa-envelope media-object bg-blue"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading"> New Email From John</h6>
                                    <div class="text-muted f-s-11">2 hour ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-footer text-center">
                            <a href="javascript:;">View more</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('img/user-13.jpg') }}" alt="" />
                        <span class="hidden-xs student_name">Adam Schwartz</span>
                    </a>
                </li>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end #header -->

    <!-- begin #sidebar -->

    <!-- end #sidebar -->

    <!-- begin #content -->
    @yield('content')
    <!-- end #content -->

    <!-- begin theme-panel -->

    <!-- end theme-panel -->

    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ asset('plugins/jquery/jquery-migrate-1.1.0.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!--[if lt IE 9]>
<script src="{{ asset('crossbrowserjs/html5shiv.js') }}"></script>
<script src="{{ asset('crossbrowserjs/respond.min.js') }}"></script>
<script src="{{ asset('crossbrowserjs/excanvas.min.js') }}"></script>
<![endif]-->
<script src="{{ asset('plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-cookie/jquery.cookie.js') }}"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{ asset('plugins/gritter/js/jquery.gritter.js') }}"></script>
<script src="{{ asset('plugins/flot/jquery.flot.min.js') }}"></script>
<script src="{{ asset('plugins/flot/jquery.flot.time.min.js') }}"></script>
<script src="{{ asset('plugins/flot/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('plugins/flot/jquery.flot.pie.min.js') }}"></script>
<script src="{{ asset('plugins/sparkline/jquery.sparkline.js') }}"></script>
<script src="{{ asset('plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/dashboard.min.js') }}"></script>
<script src="{{ asset('js/apps.min.js') }}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script src="{{ asset('js/ui-modal-notification.demo.min.js') }}"></script>


<script src="{{ asset('plugins/parsley/dist/parsley.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-wizard/js/bwizard.js') }}"></script>
<script src="{{ asset('js/form-wizards-validation.demo.min.js') }}"></script>
<script src="{{ asset('js/apps.min.js') }}"></script>
<!-- ================== BEGIN ajaxapp JS ================== -->
<script src="{{ asset('js/ajaxapp.js') }}"></script>
<!-- ================== END ajaxapp JS ================== -->
<script>
    $(document).ready(function() {
        App.init();
        Notification.init();
    });
</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-53034621-1', 'auto');
    ga('send', 'pageview');

</script>
</body>

<!-- Mirrored from seantheme.com/color-Admin-v2.0/Admin/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Apr 2016 02:43:26 GMT -->
</html>
