@extends('layouts.admin')

@section('content')
<!-- begin #content -->
<div id="content" class="content departments">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Attendance Special Group <small>Create Special Group</small></h1>
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
                    <h4 class="panel-title">Create Special Group</h4>
                </div>
                <div class="panel-body">
                    <form action="#" method="POST" name="" class="form-horizontal form_registration">
                        <div id="">

                            <!-- begin wizard step-1 -->
                            <div class="step-1">

                            </div>
                            <fieldset>
                                <legend class="pull-left width-full">Create Special Group</legend>
                                <!-- begin row -->
                                <div class="row">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Special Group Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                        <label for="status" class="col-md-4 control-label">Status</label>

                                        <div class="col-md-6">

                                            <select class="form-control" name="status" required autofocus>
                                                <option value="1">Enable</option>
                                                <option value="0">Disable</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <!-- end row -->
                            </fieldset>
                            <button type="button" class="btn btn-primary center-block btn_create"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Create new Special Group </button>
                            <!-- end wizard step-1 -->

                            <!-- #modal-alert -->
                            <div class="modal fade" id="modal-alert">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Attendance Special Group Create</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-success m-b-0">
                                                <h4><i class="fa fa-info-circle"></i> Successfully Attendance Special Group Created</h4>
                                                <p>You can update / delete/ / view Attendance Special Group information </p>
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


    </div>
    <!-- end row -->
</div>
<!-- end #content -->
<!-- start : staff registration -->
<script>
    $(document).ready(function() {

        /*
         * Start : Department Create
         *
         * */

        $(".departments").on('click','.btn_create',function()
        {
            var _token                  = $("input[name=_token]").val();
            var name                    = $(".departments input[name=name]").val();
            var status                  = $(".departments select[name=status]").val();

            var info = {

                _token                  : _token,
                name                    : name,
                status                  : status
            };

            request.method   = "POST"       	                        ;
            request.route    = 'admin/attendance/specialgroup/create'   ;
            request.action   = ''          	                            ;
            request.data     = info                                     ;
            request.sync     = true		                                ;

            var response = ajaxapp.request('$("#modal-alert").modal("show");', '');
            //setTimeout(function(){ FPS_StatusGetCon = true; FPS_Status() },1000);
        });

        /*
         * end : Department Create
         *
         * 
         * */
    });
</script>
<!-- end : staff registration -->

@endsection
