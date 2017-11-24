<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-Admin-v2.0/Admin/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Apr 2016 02:43:12 GMT -->
<head>
    <meta charset="utf-8" />
    <title>FPS Admin | Dashboard</title>
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
    <link href="{{ asset('plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/ajaxapp.css') }}" rel="stylesheet"/>
    <!-- ================== END BASE CSS STYLE ================== -->
    <link href="{{ asset('css/admin.custom.css') }}" rel="stylesheet"/>

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
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin mobile sidebar expand / collapse button -->
            <div class="navbar-header">
                <a href="{{ url('/') }}" class="navbar-brand"><span class="navbar-logo"></span> FPS Admin</a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end mobile sidebar expand / collapse button -->

            <!-- begin header navigation right -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form full-width">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter keyword" />
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </li>
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
                        @if (Auth::guest())
                        <span class="hidden-xs">Adam Schwartz</span> <b class="caret"></b>
                        @else
                        <span class="hidden-xs">{{ Auth::user()->name }}</span> <b class="caret"></b>
                        @endif
                    </a>
                    <ul class="dropdown-menu animated fadeInLeft">
                        <li class="arrow"></li>
                        <li><a href="javascript:;">Edit Profile</a></li>
                        <li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
                        <li><a href="javascript:;">Calendar</a></li>
                        <li><a href="javascript:;">Setting</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a></li>
                    </ul>
                </li>
            </ul>
            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            <!-- end header navigation right -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end #header -->

    <!-- begin #sidebar -->
    <div id="sidebar" class="sidebar">
        <!-- begin sidebar scrollbar -->
        <div data-scrollbar="true" data-height="100%">
            <!-- begin sidebar user -->
            <ul class="nav">
                <li class="nav-profile">
                    <div class="image">
                        <a href="javascript:;"><img src="{{ asset('img/user-13.jpg') }}" alt="" /></a>
                    </div>
                    <div class="info">
                        Sean Ngu
                        <small>Front end developer</small>
                    </div>
                </li>
            </ul>
            <!-- end sidebar user -->
            <!-- begin sidebar nav -->
            <ul class="nav">
                <li class="nav-header">Navigation</li>
                <li class="has-sub active">
                    <a href="{{ url('admin') }}">
                        <i class="fa fa-laptop"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-suitcase"></i>
                        <span>Office Staffs</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ url('admin/staffs') }}">Staffs Dashboard</a></li>
                        <li><a href="{{ url('admin/staffs/registration') }}">Staffs Registration</a></li>
                        <li><a href="{{ url('admin/staffs/list') }}">Staffs List</a></li>
                        

                        <!-- start : staff designation -->
                        <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-align-left"></i>
                                <span>Staff Designation</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="{{ url('admin/staffs/designations/create') }}">Designation Create</a></li>
                                <li><a href="{{ url('admin/staffs/designations/list') }}">Designation List</a></li>
                            </ul>
                        </li>
                        <!-- end : staff designation -->
                        <!-- start : staff status -->
                        <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-align-left"></i>
                                <span>Staff Status</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="{{ url('admin/staffs/status/create') }}">Status Create</a></li>
                                <li><a href="{{ url('admin/staffs/status/list') }}">Status List</a></li>
                            </ul>
                        </li>
                        <!-- end : staff status -->

                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-suitcase"></i>
                        <span>Attendance</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ url('admin/attendance') }}">Deshboard</a></li>
                        <li><a href="{{ url('admin/attendance/specialgroup/create') }}">Special Group Create</a></li>
                        <li><a href="{{ url('admin/attendance/specialgroup/list') }}">Special Group List</a></li>
                        <!-- start : staff rules -->
                        <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-align-left"></i>
                                <span>Staff Rules</span>
                            </a>
                            <ul class="sub-menu">

                                <li><a href="{{ url('admin/attendance/rule/staff/create') }}">Rule Create</a></li>
                                <li><a href="{{ url('admin/attendance/rule/staff/list') }}">Rule List</a></li>

                            </ul>
                        </li>
                        <!-- end : staff rules -->
                        <!-- start : student rules -->
                        <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-align-left"></i>
                                <span>Student Rules</span>
                            </a>
                            <ul class="sub-menu">

                                <li><a href="javascript:;">Rule Create</a></li>
                                <li><a href="javascript:;">Rule List</a></li>

                            </ul>
                        </li>
                        <!-- end : student rules -->

                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-suitcase"></i>
                        <span>Departments</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ url('admin/departments') }}">Deshboard</a></li>
                        <li><a href="{{ url('admin/departments/create') }}">Create New Department</a></li>
                        <li><a href="{{ url('admin/departments/list') }}">Department List</a></li>
                    </ul>
                </li>

                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-suitcase"></i>
                        <span>Report</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ url('admin/report/attendance') }}">Deshboard</a></li>
                        <!-- start : attendance -->
                        <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-align-left"></i>
                                <span>Attendance</span>
                            </a>
                            <ul class="sub-menu">

                                <li class="has-sub">
                                    <a href="javascript:;">
                                        <b class="caret pull-right"></b>
                                        Staff
                                    </a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ url('admin/report/attendance/person') }}">Person</a></li>
                                        <li><a href="{{ url('admin/report/attendance/daily') }}">Daily</a></li>
                                        <li><a href="{{ url('admin/report/attendance/today') }}">Today</a></li>
                                        <li><a href="{{ url('admin/report/attendance/current') }}">Current Status</a></li>
                                    </ul>
                                </li>

                                <li class="has-sub">
                                    <a href="javascript:;">
                                        <b class="caret pull-right"></b>
                                        Student
                                    </a>
                                    <ul class="sub-menu">
                                        <li><a href="javascript:;">Student</a></li>
                                        <li><a href="javascript:;">Students</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- end : attendance -->
                    </ul>
                </li>
                <!-- begin sidebar minify button -->
                <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                <!-- end sidebar minify button -->
            </ul>
            <!-- end sidebar nav -->
        </div>
        <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->

    <!-- begin #content -->
    @yield('content')
    <!-- end #content -->

    <!-- begin theme-panel -->
    <div class="theme-panel">
        <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
        <div class="theme-panel-content">
            <h5 class="m-t-0">Color Theme</h5>
            <ul class="theme-list clearfix">
                <li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
            </ul>
            <div class="divider"></div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label double-line">Header Styling</div>
                <div class="col-md-7">
                    <select name="header-styling" class="form-control input-sm">
                        <option value="1">default</option>
                        <option value="2">inverse</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label">Header</div>
                <div class="col-md-7">
                    <select name="header-fixed" class="form-control input-sm">
                        <option value="1">fixed</option>
                        <option value="2">default</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                <div class="col-md-7">
                    <select name="sidebar-styling" class="form-control input-sm">
                        <option value="1">default</option>
                        <option value="2">grid</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label">Sidebar</div>
                <div class="col-md-7">
                    <select name="sidebar-fixed" class="form-control input-sm">
                        <option value="1">fixed</option>
                        <option value="2">default</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                <div class="col-md-7">
                    <select name="content-gradient" class="form-control input-sm">
                        <option value="1">disabled</option>
                        <option value="2">enabled</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label double-line">Content Styling</div>
                <div class="col-md-7">
                    <select name="content-styling" class="form-control input-sm">
                        <option value="1">default</option>
                        <option value="2">black</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-12">
                    <a href="#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i class="fa fa-refresh m-r-3"></i> Reset Local Storage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end theme-panel -->

    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ asset('plugins/fullcalendar/lib/moment.min.js') }}"></script>
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
<script src="{{ asset('plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('js/dashboard.min.js') }}"></script>
<script src="{{ asset('js/apps.min.js') }}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script src="{{ asset('plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('js/ui-modal-notification.demo.min.js') }}"></script>


<script src="{{ asset('plugins/parsley/dist/parsley.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-wizard/js/bwizard.js') }}"></script>
<script src="{{ asset('js/form-wizards-validation.demo.min.js') }}"></script>
<!-- ================== BEGIN ajaxapp JS ================== -->
<script src="{{ asset('js/ajaxapp.js') }}"></script>
<!-- ================== END ajaxapp JS ================== -->
<script>
    $(document).ready(function() {
        App.init();
        Notification.init();

        $('#calendar').fullCalendar({
        // put your options and callbacks here
        })
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
