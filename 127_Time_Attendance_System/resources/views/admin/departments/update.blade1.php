@extends('layouts.admin')

@section('content')
<!-- begin #content -->
<div id="content" class="content department">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Departments <small>Update Department</small></h1>
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
                    <h4 class="panel-title">Update Department</h4>
                </div>
                <div class="panel-body">
                    <form action="#" method="POST" name="" class="form-horizontal">
                        <div id="">

                            <!-- begin wizard step-1 -->
                            <div class="step-1">

                            </div>
                            <fieldset>
                                <legend class="pull-left width-full">Update Department</legend>
                                <!-- begin row -->
                                <div class="row">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="name" class="col-md-4 control-label">Department Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="{{ $department->name }}" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="status" class="col-md-4 control-label">Status</label>

                                        <div class="col-md-6">
                                            <select class="form-control" name="status" required autofocus>
                                                <option value="1" <?php echo $department->status ? "selected=selected" : ""; ?> >Enable</option>
                                                <option value="0" <?php echo !$department->status ? "selected=selected" : ""; ?> >Disable</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <!-- end row -->
                            </fieldset>
                            <button type="button" class="btn btn-primary center-block btn_update"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Update Department </button>
                            <!-- end wizard step-1 -->

                            <!-- #modal-alert -->
                            <div class="modal fade" id="modal-alert">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Department Update</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-success m-b-0">
                                                <h4><i class="fa fa-info-circle"></i> Successfully Department Updated</h4>
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
<!-- start : Department update -->
<script>
    $(document).ready(function() {

        /*
         * Start : Department Update
         *
         * */

        $(".department").on('click','.btn_update',function()
        {
            var _token                  = $("input[name=_token]").val();
            var name                    = $(".department input[name=name]").val();
            var status                  = $(".department select[name=status]").val();

            var DepartmentInfo = {

                _token                  : _token,
                name                    : name,
                status                  : status
            };

            request.method   = "POST"       	                                    ;
            request.route    = 'admin/departments/{{ $department->id }}/update'     ;
            request.action   = ''          	                                        ;
            request.data     = DepartmentInfo                                       ;
            request.sync     = true		                                            ;

            var response = ajaxapp.request('$("#modal-alert").modal("show");', '');
            //setTimeout(function(){ FPS_StatusGetCon = true; FPS_Status() },1000);
        });

        /*
         * end : Department Update
         *
         * 
         * */
    });
</script>
<!-- end : Department update -->

@endsection
