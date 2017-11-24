@extends('layouts.admin')

@section('content')
<!-- begin #content -->
<div id="content" class="content staff_update">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Staff update <small> Update Staff information</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-8 -->
        <div class="col-md-6">
            <!-- start: registration -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Office Staff Update</h4>
                </div>
                <div class="panel-body">
                    <form action="#" method="POST" name="" class="form-horizontal">
                        <div id="">

                            <!-- begin wizard step-1 -->
                            <div class="step-1">

                            </div>
                            <fieldset>
                                <legend class="pull-left width-full">Office Staff Update</legend>
                                <!-- begin row -->
                                <div class="row">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="name" class="col-md-4 control-label">Name</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="{{$staff->name}}" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="designation" class="col-md-4 control-label">Department</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="department" required autofocus>
                                                @foreach ($departments as $department)
                                                    <option value="{{$department->id}}" {{ ($staff->department_id == $department->id) ? 'selected=selected':'' }} > {{$department->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="designation" class="col-md-4 control-label">Designation</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="designation" required autofocus>
                                                @foreach ($staff_designations as $designation)
                                                    <option value="{{$designation->id}}" {{ ($staff->designation_id == $designation->id) ? 'selected=selected':'' }} > {{$designation->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="joining_date" class="col-md-4 control-label">Joining Date</label>
                                        <div class="col-md-6">
                                            <select aria-label="Day" name="joining_date_day" title="Day" class="form-control input-inline">
                                                <option value="0">Day</option>
                                                @for ($i = 1; $i <= 31; $i++)
                                                    <option value="{{ $i }}" {{ ($staff->joining_date_day == $i) ? 'selected=selected':'' }} >{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <select aria-label="Month" name="joining_date_month" title="Month" class="form-control input-inline">
                                                <option value="0">Month</option>
                                                <option value="1" {{ ($staff->joining_date_month == 1) ? 'selected=selected':'' }} >Jan</option>
                                                <option value="2" {{ ($staff->joining_date_month == 2) ? 'selected=selected':'' }} >Feb</option>
                                                <option value="3" {{ ($staff->joining_date_month == 3) ? 'selected=selected':'' }} >Mar</option>
                                                <option value="4" {{ ($staff->joining_date_month == 4) ? 'selected=selected':'' }} >Apr</option>
                                                <option value="5" {{ ($staff->joining_date_month == 5) ? 'selected=selected':'' }} >May</option>
                                                <option value="6" {{ ($staff->joining_date_month == 6) ? 'selected=selected':'' }} >Jun</option>
                                                <option value="7" {{ ($staff->joining_date_month == 7) ? 'selected=selected':'' }} >Jul</option>
                                                <option value="8" {{ ($staff->joining_date_month == 8) ? 'selected=selected':'' }} >Aug</option>
                                                <option value="9" {{ ($staff->joining_date_month == 9) ? 'selected=selected':'' }} >Sept</option>
                                                <option value="10" {{ ($staff->joining_date_month == 10) ? 'selected=selected':'' }} >Oct</option>
                                                <option value="11" {{ ($staff->joining_date_month == 11) ? 'selected=selected':'' }} >Nov</option>
                                                <option value="12" {{ ($staff->joining_date_month == 12) ? 'selected=selected':'' }} >Dec</option>
                                            </select>
                                            <select aria-label="Year" name="joining_date_year" title="Year" class="form-control input-inline">
                                                <option value="0">Year</option>
                                                @for ($i = 2017; $i >= 1905; $i--)
                                                    <option value="{{ $i }}" {{ ($staff->joining_date_year == $i) ? 'selected=selected':'' }} >{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="current_status" class="col-md-4 control-label">Current Status</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="current_status" required autofocus>
                                                @foreach ($staff_status as $status)
                                                    <option value="{{$status->id}}" {{ ($staff->staff_status_id == $status->id) ? 'selected=selected':'' }} > {{$status->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="username" class="col-md-4 control-label">Username</label>
                                        <div class="col-md-6">
                                            <input id="username" type="text" class="form-control" name="username" value="{{$staff->username}}" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="col-md-4 control-label">Password</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" value="" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="mobile_number" class="col-md-4 control-label">Mobile Number</label>
                                        <div class="col-md-6">
                                            <input id="mobile_number" type="text" class="form-control" name="mobile_number" value="{{$staff->mobile_number}}" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{$staff->email}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-md-4 control-label">Birthday</label>
                                        <div class="col-md-6">
                                            <select aria-label="Day" name="birthday_day" title="Day" class="form-control input-inline">
                                                <option value="0">Day</option>
                                                @for ($i = 1; $i <= 31; $i++)
                                                    <option value="{{ $i }}" {{ ($staff->birthday_day == $i) ? 'selected=selected':'' }} >{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <select aria-label="Month" name="birthday_month" title="Month" class="form-control input-inline">
                                                <option value="0">Month</option>
                                                <option value="1" {{ ($staff->birthday_month == 1) ? 'selected=selected':'' }} >Jan</option>
                                                <option value="2" {{ ($staff->birthday_month == 2) ? 'selected=selected':'' }} >Feb</option>
                                                <option value="3" {{ ($staff->birthday_month == 3) ? 'selected=selected':'' }} >Mar</option>
                                                <option value="4" {{ ($staff->birthday_month == 4) ? 'selected=selected':'' }} >Apr</option>
                                                <option value="5" {{ ($staff->birthday_month == 5) ? 'selected=selected':'' }} >May</option>
                                                <option value="6" {{ ($staff->birthday_month == 6) ? 'selected=selected':'' }} >Jun</option>
                                                <option value="7" {{ ($staff->birthday_month == 7) ? 'selected=selected':'' }} >Jul</option>
                                                <option value="8" {{ ($staff->birthday_month == 8) ? 'selected=selected':'' }} >Aug</option>
                                                <option value="9" {{ ($staff->birthday_month == 9) ? 'selected=selected':'' }} >Sept</option>
                                                <option value="10" {{ ($staff->birthday_month == 10) ? 'selected=selected':'' }} >Oct</option>
                                                <option value="11" {{ ($staff->birthday_month == 11) ? 'selected=selected':'' }} >Nov</option>
                                                <option value="12" {{ ($staff->birthday_month == 12) ? 'selected=selected':'' }} >Dec</option>
                                            </select>
                                            <select aria-label="Year" name="birthday_year" title="Year" class="form-control input-inline">
                                                <option value="0">Year</option>
                                                @for ($i = 2017; $i >= 1905; $i--)
                                                    <option value="{{ $i }}" {{ ($staff->birthday_year == $i) ? 'selected=selected':'' }} >{{ $i }}</option>
                                                @endfor
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="current_address" class="col-md-4 control-label">Country</label>

                                        <div class="col-md-6">
                                            <select class="form-control input-inline" name="country">
                                                <option value="18" {{ ($staff->country_id == 18) ? 'selected=selected':'' }} >Bangldesh</option>
                                                <option value="99" {{ ($staff->country_id == 99) ? 'selected=selected':'' }} >India</option>
                                                <option value="223" {{ ($staff->country_id == 223) ? 'selected=selected':'' }} >USA</option>
                                                <option value="44" {{ ($staff->country_id == 44) ? 'selected=selected':'' }} >China</option>
                                                <option value="113" {{ ($staff->country_id == 113) ? 'selected=selected':'' }} >Korea</option>
                                                <option value="114" {{ ($staff->country_id == 114) ? 'selected=selected':'' }} >Kuwait</option>
                                                <option value="162" {{ ($staff->country_id == 162) ? 'selected=selected':'' }} >Pakistan</option>
                                                <option value="196" {{ ($staff->country_id == 196) ? 'selected=selected':'' }} >Srilaka</option>
                                                <option value="222" {{ ($staff->country_id == 222) ? 'selected=selected':'' }} >UK</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="current_address" class="col-md-4 control-label">Current Address</label>
                                        <div class="col-md-6">
                                            <input id="current_address" type="text" class="form-control" name="current_address" value="{{$staff->current_address}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="permanent_address" class="col-md-4 control-label">Permanent Address</label>
                                        <div class="col-md-6">
                                            <input id="permanent_address" type="text" class="form-control" name="permanent_address" value="{{$staff->permanent_address}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="status" class="col-md-4 control-label">Status</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="status" required autofocus>
                                                <option value="1" {{ ($staff->status == 1) ? 'selected=selected':'' }} >Enable</option>
                                                <option value="0" {{ ($staff->status == 0) ? 'selected=selected':'' }} >Disable</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <!-- end row -->
                            </fieldset>
                            <button type="button" class="btn btn-primary center-block btn_update"> <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Update </button>
                            <!-- end wizard step-1 -->

                            <!-- #modal-alert -->
                            <div class="modal fade" id="modal-alert">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Staff Update</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-success m-b-0">
                                                <h4><i class="fa fa-info-circle"></i> Successfully Staff Updated</h4>
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="javascript:;" class="btn btn-sm btn-success" data-dismiss="modal">Done</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end: registration -->
        </div>
        <!-- end col-8 -->
        <!-- start col-8 -->
        <div class="col-md-6">
            <!-- begin panel -->
            <div class="panel panel-primary" data-sortable-id="ui-widget-15">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Finger Print</h4>
                </div>
                <div class="panel-body">
                    <form action="#" method="POST" name="" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Finger Print ID</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="fps_id" value="{{$staff->fps_id}}" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary btn_fpsstop"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> FPS Stop </button>
                                <button type="button" class="btn btn-primary btn_fpsdirectscan"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Direct Update By Finger Print Scan </button>
                                <button type="button" class="btn btn-primary btn_fpsstart"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> FPS Start </button>
                                <style type="text/css">
                                    .btn_fpsstop, .btn_fpsdirectscan, .btn_fpsstart{margin-bottom: 5px}
                                </style>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            <!-- end panel -->
            <!-- Start : Manual Update -->
            <div class="panel panel-primary" data-sortable-id="ui-widget-15">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Finger Print Manual Update</h4>
                </div>
                <div class="panel-body">
                    <form action="#" method="POST" name="" class="form-horizontal">
                        <p>It is very daneger to manual update if do not clear about FPS ID</p>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Finger Print ID</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="fps_id_manual" value="{{$staff->fps_id}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary btn_fps_manual_update"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Manual Update </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            <!-- End : Manual Update -->
            <!-- Start : Role -->
            <div class="panel panel-warning" data-sortable-id="ui-widget-15">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Role</h4>
                </div>
                <div class="panel-body">
                    <form action="#" method="POST" name="" class="form-horizontal">
                        <p>Select rules carefully, Rules should not over overlap, otherwise shedule can be overlapp </p>
                        <div class="form-group">
                            <label for="current_status" class="col-md-4 control-label">Roles</label>
                            <div class="col-md-8">
                                <div class="btn-group-vertical btn-group-text-left" role="group" aria-label="...">
                                    
                                    
                                    @foreach ($attendance_rules_staff as $rule)
                                        <?php $check = ''; ?>

                                        @isset($staff->rules_id)

                                            @foreach (json_decode($staff->rules_id) as $rule_id)

                                            <?php
                                                if($rule->id == $rule_id){$check = 'checked';}
                                            ?>
                                            
                                            @endforeach

                                        @endisset
                                        
                                    <button type="button" class="btn btn-default">
                                        <div class="checkbox"><label><input type="checkbox" name="rules[]" value="{{ $rule->id }}" {{$check}}> {{$rule->name}} </label></div>
                                    </button>

                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary btn_rule_update"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Role Update </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            <!-- End : Role -->
        </div>
        <!-- end col-8 -->

    </div>
    <!-- end row -->
</div>
<!-- end #content -->
<!-- start : staff registration -->
<script>
    $(document).ready(function() {

        /*
         * Start : Staff Update
         * */

        $(".staff_update").on('click','.btn_update',function()
        {
            var _token                  = $("input[name=_token]").val();
            var name                    = $(".staff_update input[name=name]").val();
            var department              = $(".staff_update select[name=department]").val();
            var designation             = $(".staff_update select[name=designation]").val();

            var joining_date_day        = $(".staff_update select[name=joining_date_day]").val();
            var joining_date_month      = $(".staff_update select[name=joining_date_month]").val();
            var joining_date_year       = $(".staff_update select[name=joining_date_year]").val();

            var current_status          = $(".staff_update select[name=current_status]").val();
            var username                = $(".staff_update input[name=username]").val();
            var password                = $(".staff_update input[name=password]").val();
            var mobile_number           = $(".staff_update input[name=mobile_number]").val();
            var email                   = $(".staff_update input[name=email]").val();

            var birthday_day            = $(".staff_update select[name=birthday_day]").val();
            var birthday_month          = $(".staff_update select[name=birthday_month]").val();
            var birthday_year           = $(".staff_update select[name=birthday_year]").val();

            var country                 = $(".staff_update select[name=country]").val();
            var current_address         = $(".staff_update input[name=current_address]").val();
            var permanent_address       = $(".staff_update input[name=permanent_address]").val();
            var status                  = $(".staff_update select[name=status]").val();

            var info = {

                _token                  : _token,
                name                    : name,
                department              : department,
                designation             : designation,

                joining_date_day        : joining_date_day,
                joining_date_month      : joining_date_month,
                joining_date_year       : joining_date_year,

                current_status          : current_status,
                username                : username,
                password                : password,
                mobile_number           : mobile_number,
                email                   : email,

                birthday_day            : birthday_day,
                birthday_month          : birthday_month,
                birthday_year           : birthday_year,

                country                 : country,
                current_address         : current_address,
                permanent_address       : permanent_address,
                status                  : status
            };

            request.method   = "POST"                                           ;
            request.route    = 'admin/staffs/profile/{{$staff->id}}/update'     ;
            request.action   = ''                                               ;
            request.data     = info                                             ;
            request.sync     = true                                             ;

            var response = ajaxapp.request('$("#modal-alert").modal("show");','');
            //setTimeout(function(){ FPS_StatusGetCon = true; FPS_Status() },1000);
        });
        /*
         * end : Staff Update
         *
         * 
         * */

        /*
         * Start : FPS Direct Scan
         * */

        $(".staff_update").on('click','.btn_fpsdirectscan',function()
        {
            var _token = $("input[name=_token]").val();

            var info = {

                _token : _token
            };

            request.method   = "POST"                                                       ;
            request.route    = 'admin/staffs/profile/{{$staff->id}}/update/fpsdirectscan'   ;
            request.action   = ''                                                           ;
            request.data     = info                                                         ;
            request.sync     = false                                                        ;

            var response = ajaxapp.request('$("#modal-alert").modal("show");','');
            $("input[name=fps_id]").val(response);
            //setTimeout(function(){ FPS_StatusGetCon = true; FPS_Status() },1000);
        });
        /*
         * end : FPS Direct Scan
         *
         * 
         * */


        /*
         * Start : FPS Manual Update
         * */

        $(".staff_update").on('click','.btn_fps_manual_update',function()
        {
            if(confirm('Really do you want to update Manually?\n It it daneger if you do not know clear about manual update'))
            {
                var _token = $("input[name=_token]").val();
                var fps_id = $("input[name=fps_id_manual]").val();

                var info = {

                    _token : _token,
                    fps_id : fps_id
                };

                request.method   = "POST"                                                       ;
                request.route    = 'admin/staffs/profile/{{$staff->id}}/update/fpsmanualupdate' ;
                request.action   = ''                                                           ;
                request.data     = info                                                         ;
                request.sync     = false                                                        ;

                var response = ajaxapp.request('$("#modal-alert").modal("show");','');
                //setTimeout(function(){ FPS_StatusGetCon = true; FPS_Status() },1000);
            }
        });
        /*
         * end : FPS Manual Update
         *
         * 
         * */



        /*
         * Start : FPS Stop
         * */

        $(".staff_update").on('click','.btn_fpsstop',function()
        {
            if(confirm('Do you want to stop Finger Print Scanner?'))
            {
                var _token = $("input[name=_token]").val();

                var info = {

                    _token : _token
                };

                request.method   = "POST"                                                       ;
                request.route    = 'admin/staffs/profile/{{$staff->id}}/update/fpsscanstop' ;
                request.action   = ''                                                           ;
                request.data     = info                                                         ;
                request.sync     = false                                                        ;

                var response = ajaxapp.request();
            }
        });
        /*
         * end : FPS Stop
         *
         * 
         * */

        /*
         * Start : FPS Start
         * */

        $(".staff_update").on('click','.btn_fpsstart',function()
        {
            if(confirm('Do you want to start Finger Print Scanner?'))
            {
                var _token = $("input[name=_token]").val();

                var info = {

                    _token : _token
                };

                request.method   = "POST"                                                       ;
                request.route    = 'admin/staffs/profile/{{$staff->id}}/update/fpsscanstart' ;
                request.action   = ''                                                           ;
                request.data     = info                                                         ;
                request.sync     = false                                                        ;

                var response = ajaxapp.request();
            }
        });
        /*
         * end : FPS Start
         *
         * 
         * */


        /*
         * Start : Rule Update
         * */

        $(".staff_update").on('click','.btn_rule_update',function()
        {
            if(confirm('Really do you want to change rule?'))
            {
                var _token   = $("input[name=_token]").val();
                var rules_id = [];

                $("input:checkbox[name='rules[]']:checked").each(function(){
                    rules_id.push($(this).val());
                });

                var info = {

                    _token   : _token,
                    rules_id : rules_id
                };

                request.method   = "POST"                                            ;
                request.route    = 'admin/staffs/profile/{{$staff->id}}/update/rule' ;
                request.action   = ''                                                ;
                request.data     = info                                              ;
                request.sync     = false                                             ;

                var response = ajaxapp.request('$("#modal-alert").modal("show");','');
                //setTimeout(function(){ FPS_StatusGetCon = true; FPS_Status() },1000);
            }
        });
        /*
         * end : Rule Update
         *
         * 
         * */
    });
</script>
<!-- end : staff registration -->

@endsection
