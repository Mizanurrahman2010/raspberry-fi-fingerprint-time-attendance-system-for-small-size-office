@extends('layouts.admin')

@section('content')
<!-- begin #content -->
<div id="content" class="content department_list">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Department</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Attendance Special Group <small>Attendance Special Group List</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
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
                    <h4 class="panel-title">Attendance Special Group List</h4>
                    {{ csrf_field() }}
                </div>
                <div class="panel-body">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($attendance_specialgroups as $key => $value)
                            {

                            $status = $value->status ? 'Enable' : 'Disabled' ;
                            
                            echo '
                            <tr class="odd gradeX">
                                <td>'.$value->name.'</td>
                                <td>'.$status.'</td>
                                <td>
                                    <div class="btn-group btn-group">
                                        <a href="'.url("/admin/attendance/specialgroup/{$value->id}/view").'" class="btn btn-primary active"><i class="fa fa-cog"></i> View </a>
                                        <a href="'.url("/admin/attendance/specialgroup/{$value->id}/update").'" class="btn btn-success"><i class="fa fa-edit"></i> Update </a>
                                        <a href="javascript:;" data-id="'.$value->id.'" class="btn btn-danger btn_delete"><i class="fa fa-edit"></i> Delete </a>
                                    </div>
                                </td>
                            </tr>
                                ';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->
<!-- start : departments -->
<script>
    $(document).ready(function() {

        /*
         * Start : Department Update
         *
         * */

        $(".department_list").on('click','.btn_delete',function()
        {
            var _token = $("input[name=_token]").val();

            var info = {

                _token : _token
            };

            request.method   = "POST"                                                               ;
            request.route    = 'admin/attendance/specialgroup/'+$(this).attr("data-id")+'/delete'   ;
            request.action   = ''                                                                   ;
            request.data     = info                                                                 ;
            request.sync     = true                                                                 ;

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
<!-- end : departments -->

@endsection
