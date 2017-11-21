@extends('layouts.admin')

@section('content')
<!-- begin #content -->
<div id="content" class="content  attendance_rule_staff_department">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Attendance Rule View</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Attendance Rule <small> Create Staff Attendance Rule for department</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-8 -->
        <div class="col-md-12">
            <!-- start: registration -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Attendance Rule View</h4>
                </div>
                <div class="panel-body" style="position: relative;">
                    <div class="overlay"></div>
                    <form action="#" method="POST" name="" class="form-horizontal">

                        <!-- begin wizard step-1 -->

                            <legend class="pull-left width-full">Attendance Rule : {{$rule->name}}</legend>
                            <!-- begin row -->
                            <div class="row">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label"> Rule Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{$rule->name}}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="current_status" class="col-md-3 control-label">Cycle</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="cycle" required>
                                            <option value="7">Weekly</option>
                                            <option value="1">Daily</option>
                                            <option value="31">Monthly</option>
                                            <option value="-1">Custom</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- start : time table -->

                                <div class="col-md-12">
                                    <table class="table table-bordered custom-form-control">
                                        <thead>
                                            <tr>
                                                <th>Day</th>
                                                <th>Count as Early Come (From)</th>
                                                <th>Normal In Time From</th>
                                                <th>On Duty Time</th>
                                                <th>Normal In Time To</th>
                                                <th>Late Count Untill</th>

                                                <th>Duty Running Period</th>

                                                <th>Count as Early Leave (From)</th>
                                                <th>Normal Out Time From</th>
                                                <th>Off Duty Time</th>
                                                <th>Normal Out Time To</th>
                                                <th>Late Leave Count Untill</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                                $days_name = [
                                                  0 => 'Sunday',
                                                  1 => 'Monday',
                                                  2 => 'Tuesday',
                                                  3 => 'Wednesday',
                                                  4 => 'Thursday',
                                                  5 => 'Friday',
                                                  6 => 'Saturday'
                                                ];

                                                $days = unserialize($rule->days);
                                                //var_dump($rule->days);
                                                //var_dump($days);
                                                
                                            ?>

                                            @foreach($days as $day)
                                            
                                            <tr>
                                                <td><div class="checkbox"><label><input type="checkbox" name="day[]" value="{{ $loop->index }}" {{ $day['weekend']? '':'checked' }}>{{ $days_name[$loop->index] }}</label></div></td>
                                                <td>
                                                    <div class="input-group bootstrap-timepicker timepicker">
                                                        <input name="count_as_early_come_from[]" type="text" value="{{ $day['count_as_early_come_from'] }}" class="form-control input-small timepicker_c">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group bootstrap-timepicker timepicker">
                                                        <input name="normal_in_time_from[]" type="text" value="{{ $day['normal_in_time_from'] }}" class="form-control input-small timepicker_c">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group bootstrap-timepicker timepicker">
                                                        <input name="on_duty_time[]" type="text" value="{{ $day['on_duty_time'] }}" class="form-control input-small timepicker_c">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group bootstrap-timepicker timepicker">
                                                        <input name="normal_in_time_to[]" type="text" value="{{ $day['normal_in_time_to'] }}" class="form-control input-small timepicker_c">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group bootstrap-timepicker timepicker">
                                                        <input name="late_count_untill[]" type="text" value="{{ $day['late_count_untill'] }}" class="form-control input-small timepicker_c">
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <div class="input-group bootstrap-timepicker timepicker">
                                                        <input name="count_as_early_leave_from[]" type="text" value="{{ $day['count_as_early_leave_from'] }}" class="form-control input-small timepicker_c">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group bootstrap-timepicker timepicker">
                                                        <input name="normal_out_time_from[]" type="text" value="{{ $day['normal_out_time_from'] }}" class="form-control input-small timepicker_c">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group bootstrap-timepicker timepicker">
                                                        <input name="off_duty_time[]" type="text" value="{{ $day['off_duty_time'] }}" class="form-control input-small timepicker_c">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group bootstrap-timepicker timepicker">
                                                        <input name="normal_out_time_to[]" type="text" value="{{ $day['normal_out_time_to'] }}" class="form-control input-small timepicker_c">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group bootstrap-timepicker timepicker">
                                                        <input name="late_leave_count_untill[]" type="text" value="{{ $day['late_leave_count_untill'] }}" class="form-control input-small timepicker_c">
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <style type="text/css">
                                        .custom-form-control .form-control{padding: 6px 8px}
                                        .custom-form-control.table>tbody>tr>td{padding: 10px 5px}
                                    </style>
                                </div>

                                <!-- end : time table -->

                                <div class="form-group">
                                    <label for="current_status" class="col-md-4 control-label">Validate From</label>
                                    <div class="col-md-6">
                                        <div class="input-group date" id="datetimepicker1">
                                            <?php

                                                $validate_from_day   = date('d', strtotime($rule->validate_from));
                                                $validate_from_month = date('m', strtotime($rule->validate_from));
                                                $validate_from_year  = date('Y', strtotime($rule->validate_from));
                                                
                                            ?>
                                            <select aria-label="Day" name="validate_from_day" title="Day" class="form-control input-inline">
                                                <option value="0">Day</option>
                                                @for ($i = 1; $i <= 31; $i++)
                                                    <option value="{{ $i }}" {{ ($validate_from_day == $i) ? 'selected=selected':'' }} >{{ $i }}</option>
                                                @endfor
                                            </select>

                                            <select aria-label="Month" name="validate_from_month" title="Month" class="form-control input-inline">
                                                <option value="0">Month</option>
                                                @for ($i = 1; $i <= 12; $i++)
                                                    date_format($i,'M')
                                                    <option value="{{ $i }}" {{ ($validate_from_month == $i) ? 'selected=selected':'' }} >{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <select aria-label="Year" name="validate_from_year" title="Year" class="form-control input-inline">
                                                <option value="0">Year</option>
                                                @for ($i = 2020; $i >= 1905; $i--)
                                                    <option value="{{ $i }}" {{ ($validate_from_year == $i) ? 'selected=selected':'' }} >{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-md-4 control-label">Validate To</label>
                                    <div class="col-md-6">
                                        <div class="input-group date" id="datetimepicker2">
                                            <?php

                                                $validate_to_day   = date('d', strtotime($rule->validate_to));
                                                $validate_to_month = date('m', strtotime($rule->validate_to));
                                                $validate_to_year  = date('Y', strtotime($rule->validate_to));
                                                
                                            ?>
                                            <select aria-label="Day" name="validate_to_day" title="Day" class="form-control input-inline">
                                                <option value="0">Day</option>
                                                @for ($i = 1; $i <= 31; $i++)
                                                    <option value="{{ $i }}" {{ ($validate_to_day == $i) ? 'selected=selected':'' }} >{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <select aria-label="Month" name="validate_to_month" title="Month" class="form-control input-inline">
                                                <option value="0">Month</option>
                                                @for ($i = 1; $i <= 12; $i++)
                                                    date_format($i,'M')
                                                    <option value="{{ $i }}" {{ ($validate_to_month == $i) ? 'selected=selected':'' }} >{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <select aria-label="Year" name="validate_to_year" title="Year" class="form-control input-inline">
                                                <option value="0">Year</option>
                                                @for ($i = 2020; $i >= 1905; $i--)
                                                    <option value="{{ $i }}" {{ ($validate_to_year == $i) ? 'selected=selected':'' }} >{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="current_status" class="col-md-4 control-label">Department</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="department" required autofocus>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}" {{ ($rule->department_id == $department->id) ? 'selected=selected':'' }} >{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status" class="col-md-4 control-label">Status</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="status" required autofocus>
                                            <option value="1" {{ ($rule->status == 1) ? 'selected=selected':'' }} >Enable</option>
                                            <option value="0" {{ ($rule->status == 0) ? 'selected=selected':'' }} >Disable</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <!-- end row -->

                        <!-- end wizard step-1 -->
                        <!-- #modal-alert -->
                        <div class="modal fade" id="modal-alert">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Attendance Rule Update</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-success m-b-0">
                                            <h4><i class="fa fa-info-circle"></i> Successfully Attendance Rule Updated</h4>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="javascript:;" class="btn btn-sm btn-success" data-dismiss="modal">Done</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            <a href="{{ url("/admin/attendance/rule/staff/$rule->id/update") }}" class="btn btn-primary"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Update </a>
                            <button type="button" class="btn btn-danger btn_delete" data-id="{{$rule->id}}"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Delete </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: registration -->
        </div>
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

        $(".attendance_rule_staff_department").on('click','.btn_create',function()
        {
            var _token                      = $("input[name=_token]").val();
            var name                        = $(".attendance_rule_staff_department input[name=name]").val();

            var entry_time_from_hour        = $(".attendance_rule_staff_department select[name=entry_time_from_hour]").val();
            var entry_time_from_minute      = $(".attendance_rule_staff_department select[name=entry_time_from_minute]").val();
            var entry_time_from_am_pm       = $(".attendance_rule_staff_department select[name=entry_time_from_am_pm]").val();

            var entry_time_to_hour          = $(".attendance_rule_staff_department select[name=entry_time_to_hour]").val();
            var entry_time_to_minute        = $(".attendance_rule_staff_department select[name=entry_time_to_minute]").val();
            var entry_time_to_am_pm         = $(".attendance_rule_staff_department select[name=entry_time_to_am_pm]").val();

            var out_time_from_hour          = $(".attendance_rule_staff_department select[name=out_time_from_hour]").val();
            var out_time_from_minute        = $(".attendance_rule_staff_department select[name=out_time_from_minute]").val();
            var out_time_from_am_pm         = $(".attendance_rule_staff_department select[name=out_time_from_am_pm]").val();

            var out_time_to_hour            = $(".attendance_rule_staff_department select[name=out_time_to_hour]").val();
            var out_time_to_minute          = $(".attendance_rule_staff_department select[name=out_time_to_minute]").val();
            var out_time_to_am_pm           = $(".attendance_rule_staff_department select[name=out_time_to_am_pm]").val();

            var validate_from_day           = $(".attendance_rule_staff_department select[name=validate_from_day]").val();
            var validate_from_month         = $(".attendance_rule_staff_department select[name=validate_from_month]").val();
            var validate_from_year          = $(".attendance_rule_staff_department select[name=validate_from_year]").val();

            var validate_to_day             = $(".attendance_rule_staff_department select[name=validate_to_day]").val();
            var validate_to_month           = $(".attendance_rule_staff_department select[name=validate_to_month]").val();
            var validate_to_year            = $(".attendance_rule_staff_department select[name=validate_to_year]").val();

            var department                  = $(".attendance_rule_staff_department select[name=department]").val();
            var priority                    = $(".attendance_rule_staff_department input[name=priority]").val();
            var status                      = $(".attendance_rule_staff_department select[name=status]").val();

            var info = {

                _token                      : _token ,
                name                        : name ,      

                entry_time_from_hour        : entry_time_from_hour,
                entry_time_from_minute      : entry_time_from_minute,
                entry_time_from_am_pm       : entry_time_from_am_pm,

                entry_time_to_hour          : entry_time_to_hour,
                entry_time_to_minute        : entry_time_to_minute,
                entry_time_to_am_pm         : entry_time_to_am_pm,

                out_time_from_hour          : out_time_from_hour,
                out_time_from_minute        : out_time_from_minute,
                out_time_from_am_pm         : out_time_from_am_pm,

                out_time_to_hour            : out_time_to_hour,
                out_time_to_minute          : out_time_to_minute,
                out_time_to_am_pm           : out_time_to_am_pm,

                validate_from_day           : validate_from_day ,
                validate_from_month         : validate_from_month ,
                validate_from_year          : validate_from_year ,

                validate_to_day             : validate_to_day ,
                validate_to_month           : validate_to_month ,
                validate_to_year            : validate_to_year ,

                department                  : department ,
                priority                    : priority ,
                status                      : status 
            };

            request.method   = "POST"       	                               ;
            request.route    = 'admin/attendance/rule/staff/{{$rule->id}}/update' ;
            request.action   = ''          	                                   ;
            request.data     = info                                            ;
            request.sync     = true		                                       ;

            var response = ajaxapp.request('$("#modal-alert").modal("show");','');
            //setTimeout(function(){ FPS_StatusGetCon = true; FPS_Status() },1000);
        });
        /*
         * end : Student Registration
         *
         * Retrive period - 15 seconds
         * */
    });
</script>
<!-- end : staff registration -->

@endsection
