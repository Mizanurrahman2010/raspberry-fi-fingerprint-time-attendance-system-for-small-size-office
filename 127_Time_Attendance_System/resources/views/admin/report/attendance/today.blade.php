@extends('layouts.admin')

@section('content')
<!-- begin #content -->
<div id="content" class="content">
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
                    <form class="form-inline" action="#" method="POST">
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
                    <div class="form-group">
                        <label class="col-md-1 control-label">Filter : </label>
                        <div class="col-md-11 filter">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="2" checked>
                                Date
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="3" checked>
                                Name
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="4" checked>
                                Entry Time
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="5" checked>
                                Out Time
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="6" checked>
                                Work Duration
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="7" checked>
                                Entry Delay/Advance
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="8" checked>
                                Out Early/Late
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="9" checked>
                                Attened
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="10" checked>
                                Entry Status
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="11" checked>
                                Out Status
                            </label>
                        </div>
                    </div>
                    <br>
                    <!-- end : filter options -->

                    <table id="data-table" class="table table-striped" style="border: 1px solid #ccc;border: 1px solid #ccc;font-size: 13px;color: #000;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Shift Name</th>
                                <th>Entry Time</th>
                                <th>Out Time</th>
                                <th>Work Duration</th>
                                <th>Entry Delay/Advance</th>
                                <th>Out Early/Late</th>
                                <th>Attened</th>
                                <th>Entry Status</th>
                                <th>Out Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>01-11-2017</td>
                                <td>MD. Mizanur rahman</td>
                                <td>Monring Shift</td>
                                <td>08:00:00</td>
                                <td>04:00:00</td>
                                <td>14:00:00</td>
                                <td>+04:00:00</td>
                                <td>-08:00:00</td>
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

            var _token      = $("input[name=_token]").val();

            // var date_start  = $("input[name=date_start]").val();
            // var date_end    = $("input[name=date_end]").val();
            // var staff_id    = $("select[name=staff_id]").val();

            var info = {

                _token     : _token
            };

            request.method   = "POST"       	                    ;
            request.route    = 'admin/report/attendance/today'     ;
            request.action   = ''          	                        ;
            request.data     = info                                 ;
            request.sync     = false		                        ;

            var response = ajaxapp.request();

            if(response)
            {
                $("table tbody").empty();

                if(response) {
                    var i = 0;
                    for (i = 0; i < response.length; i++) {

                        var date         = response[i]['date'];
                        var staff_name   = response[i]['staff_name'];
                        var rule_name    = response[i]['rule_name'];
                        var entry_time   = response[i]['entry_time'];
                        var out_time     = response[i]['out_time'];

                        var entry_delay_or_advanced_duration = response[i]['entry_delay_or_advanced_duration'];
                        var out_delay_or_advanced_duration   = response[i]['out_delay_or_advanced_duration'];
                        var work_duration                    = response[i]['work_duration'];

                        var attened      = response[i]['attened'];
                        var entry_status = response[i]['entry_status_comment'];
                        var out_status   = response[i]['out_status_comment'];

                        // entry_status = 0 # 0 = no entry, 1 = intime, 2 = late,        3 = early come
                        // out_status   = 0 # 0 = no out,   1 = intime, 2 = early leave, 3 = late leave

                        if(response[i]['entry_status'] == 0) var entry_status = '<button type="button" class="btn btn-default btn-sm">'+entry_status+'</button>';
                        if(response[i]['entry_status'] == 1) var entry_status = '<button type="button" class="btn btn-primary btn-sm">'+entry_status+'</button>';
                        if(response[i]['entry_status'] == 2) var entry_status = '<button type="button" class="btn btn-warning btn-sm">'+entry_status+'</button>';
                        if(response[i]['entry_status'] == 3) var entry_status = '<button type="button" class="btn btn-success btn-sm">'+entry_status+'</button>';

                        if(response[i]['out_status'] == 0) var out_status = '<button type="button" class="btn btn-default btn-sm">'+out_status+'</button>';
                        if(response[i]['out_status'] == 1) var out_status = '<button type="button" class="btn btn-primary btn-sm">'+out_status+'</button>';
                        if(response[i]['out_status'] == 2) var out_status = '<button type="button" class="btn btn-warning btn-sm">'+out_status+'</button>';
                        if(response[i]['out_status'] == 3) var out_status = '<button type="button" class="btn btn-success btn-sm">'+out_status+'</button>';

                        var html = '';

                        html += '    <tr>';
                        html += '        <td>'+ i               +'</td>';
                        html += '        <td>'+ date            +'</td>';
                        html += '        <td>'+ staff_name      +'</td>';
                        html += '        <td>'+ rule_name       +'</td>';
                        html += '        <td>'+ entry_time      +'</td>';
                        html += '        <td>'+ out_time        +'</td>';

                        html += '        <td>'+ work_duration                    +'</td>';
                        html += '        <td>'+ entry_delay_or_advanced_duration +'</td>';
                        html += '        <td>'+ out_delay_or_advanced_duration   +'</td>';

                        html += '        <td>'+ attened         +'</td>';
                        html += '        <td>'+ entry_status    +'</td>';
                        html += '        <td>'+ out_status      +'</td>';
                        html += '    </tr>';

                        $("table tbody").append(html);
                    }
                }

                // $(e+" .search").addClass('hide');
                // $(e+" .student_info").removeClass('hide');
            }
        }

        $("body").on('click','.btn_search',function()
        {
            search();
        });

        /*
         * End : Student search for academic info
         * */



        /*
        * Start : filter
        * */
        $(".filter").on('click', 'input[type=checkbox]', function(){

            var n       = $(this).val();
            var checked = $(this).prop( "checked" );

            if( checked )
            {
                $("#data-table tr td:nth-child("+n+")").show();
                $("#data-table tr th:nth-child("+n+")").show();
            }
            else
            {
                $("#data-table tr td:nth-child("+n+")").hide();
                $("#data-table tr th:nth-child("+n+")").hide();
            }
        });


        // Start : Statup time filter
        // var checkboxs = $(".filter input[type=checkbox]") ;

        // for (var i = 0; i < checkboxs.length; i++)
        // {
        //     var e = $(".filter input[type=checkbox]:nth-child("+i+")");

        //     var n       = e.val();
        //     var checked = e.prop( "checked" );

        //     console.log(e);
        //     console.log(n);
        //     console.log(checked);
        //     // if( checked )
        //     // {
        //     //     $("#data-table tr td:nth-child("+n+")").show();
        //     //     $("#data-table tr th:nth-child("+n+")").show();
        //     // }
        //     // else
        //     // {
        //     //     $("#data-table tr td:nth-child("+n+")").hide();
        //     //     $("#data-table tr th:nth-child("+n+")").hide();
        //     // }

        // }
        // End : Statup time filter


        /*
         * End : filter
         * */

    });
</script>
<!-- end : staff registration -->

@endsection
