@extends('layouts.admin')

@section('content')
<!-- begin #content -->
<div id="content" class="content report_attendance_person">
    {{ csrf_field() }}
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Person <small>header small text goes here...</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">

        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Staff Attendance Report</h4>
                </div>
                <div class="alert alert-info fade in">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Etc...
                </div>
                <div class="panel-body">

                    <!-- start : filter options -->
                    <form class="form-inline" action="http://seantheme.com/" method="POST">
                        <div class="input-group input-daterange">
                            <input type="date" class="form-control" name="date_start" placeholder="Date Start">
                            <span class="input-group-addon">to</span>
                            <input type="date" class="form-control" name="date_end" placeholder="Date End">
                        </div>
                        <div class="form-group">
                        <select class="form-control" name="staff_id">
                            <option value="-1">Select</option>
                            @foreach ($staffs as $staff)
                                <option value="{{ $staff->id }}" >{{  $staff->name }}</option>
                            @endforeach
                        </select>
                        </div>
                        <button type="button" class="btn btn-sm btn-primary btn_search">Search</button>
                    </form>
                    <br>
                    <!-- end : filter options -->

                    <table id="data-table" class="table table-striped" style="border: 1px solid #ccc;border: 1px solid #ccc;font-size: 15px;color: #000;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Entry Time</th>
                                <th>Out Time</th>
                                <th>Attened</th>
                                <th>Entry Status</th>
                                <th>Out Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>01-11-2017</td>
                                <td>Monring Shift</td>
                                <td>08:00:00</td>
                                <td>04:00:00</td>
                                <td>Attened In time</td>
                                <td>leave In Time</td>
                                <td>Attened</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-8 -->
        <!-- begin col-4 -->
        <div class="col-md-4">

        </div>
        <!-- end col-4 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->
<!-- start : staff registration -->
<script>
    $(document).ready(function() {

        /*
         * Start : Student Registration
         * */

        $(".form_registration").on('click','.next',function()
        {
            var _token                  = $("input[name=_token]").val();
            var name                    = $(".form_registration input[name=name]").val();
            var designation             = $(".form_registration select[name=designation]").val();
            var joining_date            = $(".form_registration input[name=joining_date]").val();
            var current_status          = $(".form_registration select[name=current_status]").val();
            var username                = $(".form_registration input[name=username]").val();
            var password                = $(".form_registration input[name=password]").val();
            var mobile_number           = $(".form_registration input[name=mobile_number]").val();
            var email                   = $(".form_registration input[name=email]").val();
            var current_address         = $(".form_registration input[name=current_address]").val();
            var permanent_address       = $(".form_registration input[name=permanent_address]").val();
            var status                  = $(".form_registration select[name=status]").val();

            var StaffInfo = {

                _token                  : _token,
                name                    : name,
                designation             : designation,
                joining_date            : joining_date,
                current_status          : current_status,
                username                : username,
                password                : password,
                mobile_number           : mobile_number,
                email                   : email,
                current_address         : current_address,
                permanent_address       : permanent_address,
                status                  : status
            };

            request.method   = "POST"       	              ;
            request.route    = 'admin/staffs/registration'     ;
            request.action   = ''          	                  ;
            request.data     = StaffInfo                      ;
            request.sync     = true		                      ;

            var response = ajaxapp.request(
                    'FPS_StatusGetCon = false;' +
                    'FPS_StatusSetClear = true;' +
                    '$(".ViewProfile").attr("href",HTTP_SERVER+"/admin/student/profile/"+return_data+"/view");' +
                    '$(".SuccessInfo").show();' +
                    '$("#modal-alert").modal("show");','');
            //setTimeout(function(){ FPS_StatusGetCon = true; FPS_Status() },1000);
        });
        /*
         * end : Student Registration
         *
         * Retrive period - 15 seconds
         * */




        /*
         * Start : Student Search for academic info
         * */
        function search()
        {
            var e = '.report_attendance_person';

            var _token      = $("input[name=_token]").val();

            var date_start  = $(e+" input[name=date_start]").val();
            var date_end    = $(e+" input[name=date_end]").val();
            var staff_id    = $(e+" select[name=staff_id]").val();

            var info = {

                _token     : _token ,
                date_start : date_start,
                date_end   : date_end,
                staff_id   : staff_id
            };

            request.method   = "POST"       	                    ;
            request.route    = 'admin/report/attendance/person'     ;
            request.action   = ''          	                        ;
            request.data     = info                                 ;
            request.sync     = false		                        ;

            var response = ajaxapp.request();

            if(response)
            {
                $(e+" table tbody").empty();

                if(response) {
                    var i = 0;
                    for (i = 0; i < response.length; i++) {

                        var date         = response[i]['date'];
                        var rule_name    = response[i]['rule_name'];
                        var entry_time   = response[i]['entry_time'];
                        var out_time     = response[i]['out_time'];
                        var attened      = response[i]['attened'];
                        var entry_status = response[i]['entry_status'] +' = '+ response[i]['entry_status_comment'];
                        var out_status   = response[i]['out_status'] +' = '+ response[i]['out_status_comment'];

                        if(response[i]['entry_status'] == 0) var entry_status = '<button type="button" class="btn btn-primary">'+entry_status+'</button>';
                        if(response[i]['entry_status'] == 1) var entry_status = '<button type="button" class="btn btn-warning">'+entry_status+'</button>';
                        if(response[i]['entry_status'] == 2) var entry_status = '<button type="button" class="btn btn-success">'+entry_status+'</button>';

                        if(response[i]['out_status'] == 0) var out_status = '<button type="button" class="btn btn-primary">'+out_status+'</button>';
                        if(response[i]['out_status'] == 1) var out_status = '<button type="button" class="btn btn-warning">'+out_status+'</button>';
                        if(response[i]['out_status'] == 2) var out_status = '<button type="button" class="btn btn-success">'+out_status+'</button>';

                        var html = '';

                        html += '    <tr>';
                        html += '        <td>'+ i               +'</td>';
                        html += '        <td>'+ date            +'</td>';
                        html += '        <td>'+ rule_name       +'</td>';
                        html += '        <td>'+ entry_time      +'</td>';
                        html += '        <td>'+ out_time        +'</td>';
                        html += '        <td>'+ attened         +'</td>';
                        html += '        <td>'+ entry_status    +'</td>';
                        html += '        <td>'+ out_status      +'</td>';
                        html += '    </tr>';

                        $(e + " table tbody").append(html);
                    }
                }

                // $(e+" .search").addClass('hide');
                // $(e+" .student_info").removeClass('hide');
            }
        }

        $(".report_attendance_person").on('click','.btn_search',function()
        {
            search();
        });

        /*
         * End : Student search for academic info
         * */

    });
</script>
<!-- end : staff registration -->

@endsection
