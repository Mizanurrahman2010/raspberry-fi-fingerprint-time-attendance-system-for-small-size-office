@extends('layouts.admin')

@section('content')
<!-- begin #content -->
<div id="content" class="content attendance_specialgroup">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Attendance Special Group <small>Update Group</small></h1>
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
                    <h4 class="panel-title">Update Group</h4>
                </div>
                <div class="panel-body">
                    <form action="#" method="POST" name="" class="form-horizontal form_registration">
                        <div id="">

                            <!-- begin wizard step-1 -->
                            <div class="step-1">

                            </div>
                            <fieldset>
                                <legend class="pull-left width-full">Attendance Special Group</legend>
                                <!-- begin row -->
                                <div class="row">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="name" class="col-md-4 control-label">Attendance Special Group Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="{{ $attendance_specialgroup->name }}" required autofocus style="font-size: 16px;font-weight: bold;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="status" class="col-md-4 control-label">Status</label>

                                        <div class="col-md-6">
                                            <select class="form-control" name="status" required autofocus>
                                                <option value="1" <?php echo $attendance_specialgroup->status ? "selected=selected" : ""; ?> >Enable</option>
                                                <option value="0" <?php echo !$attendance_specialgroup->status ? "selected=selected" : ""; ?> >Disable</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <!-- end row -->
                            </fieldset>
                            <button type="button" class="btn btn-primary center-block btn_update"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Update Attendance Special Group </button>
                            <br><br><br><br>
                            <!-- end wizard step-1 -->

                            <!-- #modal-alert -->
                            <div class="modal fade" id="modal-alert">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Attendance Special Group Update</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-success m-b-0">
                                                <h4><i class="fa fa-info-circle"></i> Successfully Attendance Special Group Updated</h4>
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
                    <h4 class="panel-title">Insert Staff</h4>
                </div>
                <div class="panel-body">
                    <form action="#" method="POST" name="" class="form-horizontal">
                        <div id="">

                            <!-- begin wizard step-1 -->
                            <div class="step-1">

                            </div>
                            <fieldset>
                                <legend class="pull-left width-full">Insert Staff</legend>
                                <!-- begin row -->
                                <div class="row">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="search" placeholder="Type staff name or mobile number" value="" required autofocus style="font-size: 16px;font-weight: bold;">
                                            <div class="list-group" id="specialgroup_search_results" style="overflow-y: scroll;max-height: 138px;border: 1px solid #ccc;border-radius: 0 0 4px 4px;">
                                                <li class="list-group-item"><h5 style="margin: 0">MD. Mizanur rahman (+8801818842431) <button type="button" class="btn btn-primary btn-sm">Insert</button> </h5> </li>
                                                <li class="list-group-item"><h5 style="margin: 0">MD. Mizanur rahman (+8801818842431) <button type="button" class="btn btn-primary btn-sm">Insert</button> </h5> </li>
                                                <li class="list-group-item"><h5 style="margin: 0">MD. Mizanur rahman (+8801818842431) <button type="button" class="btn btn-primary btn-sm">Insert</button> </h5> </li>
                                                <li class="list-group-item"><h5 style="margin: 0">MD. Mizanur rahman (+8801818842431) <button type="button" class="btn btn-primary btn-sm">Insert</button> </h5> </li>
                                                <li class="list-group-item">Vestibulum at eros</li>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </fieldset>
                            <!-- end wizard step-1 -->

                            <!-- #modal-alert -->
                            <div class="modal fade" id="modal-alert">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Attendance Special Group Update</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-success m-b-0">
                                                <h4><i class="fa fa-info-circle"></i> Successfully Attendance Special Group Updated</h4>
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
                    <h4 class="panel-title">Staff List under this Attendance Special Group</h4>
                    {{ csrf_field() }}
                </div>
                <div class="panel-body">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($attendance_specialgroup_staffs as $key => $value)
                            {

                            $status = $value->status ? 'Enable' : 'Disabled' ;
                            
                            echo '
                            <tr class="odd gradeX">
                                <td>'.$value->name.'</td>
                                <td>'.$value->department_name.'</td>
                                <td>'.$value->mobile_number.'</td>
                                <td>'.$value->email.'</td>
                                <td>'.$status.'</td>
                                <td>
                                    <div class="btn-group btn-group">
                                        <a href="'.url("/admin/attendance/specialgroup/{$value->id}/view").'" class="btn btn-primary active"><i class="fa fa-cog"></i> View Specail Group</a>
                                        <a href="'.url("/admin/attendance/specialgroup/{$value->id}/update").'" class="btn btn-success"><i class="fa fa-edit"></i> Update Specail Group</a>
                                        <a href="javascript:;" data-id="'.$value->id.'" class="btn btn-danger btn_delete"><i class="fa fa-edit"></i> Delete Specail Group</a>
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
<!-- start : Special Group update -->
<script>
    $(document).ready(function() {

        /*
         * Start : Special Group Update
         *
         * */

        $(".attendance_specialgroup").on('click','.btn_update',function()
        {
            var _token                  = $("input[name=_token]").val();
            var name                    = $(".attendance_specialgroup input[name=name]").val();
            var status                  = $(".attendance_specialgroup select[name=status]").val();

            var info = {

                _token                  : _token,
                name                    : name,
                status                  : status
            };

            request.method   = "POST"       	                                    ;
            request.route    = 'admin/attendance/specialgroup/{{ $attendance_specialgroup->id }}/update'     ;
            request.action   = ''          	                                        ;
            request.data     = info                                       ;
            request.sync     = true		                                            ;

            var response = ajaxapp.request('$("#modal-alert").modal("show");', '');
            //setTimeout(function(){ FPS_StatusGetCon = true; FPS_Status() },1000);
        });

        /*
         * end : Special Group Update
         *
         * 
         * */

        /*
         * Start : Special Group Staff Search
         *
         * */

        $(".attendance_specialgroup").on('keyup','input[name=search]',function()
        {
            var _token    = $("input[name=_token]").val();
            var keyword   = $(".attendance_specialgroup input[name=search]").val();

            var info = {

                _token  : _token,
                keyword : keyword
            };

            request.method   = "POST"                                                                               ;
            request.route    = 'admin/attendance/specialgroup/{{ $attendance_specialgroup->id }}/staffs/search'     ;
            request.action   = ''                                                                                   ;
            request.data     = info                                                                                 ;
            request.sync     = true                                                                                 ;

            var response = ajaxapp.request('specialgroup_search_results(return_data)','');

            //var response = ajaxapp.request('$("#modal-alert").modal("show");', '');

        });

        /*
         * end : Special Group Staff Search
         *
         * 
         * */
    });

    /*
     * start : search result insert in specialgroup_search_results
     *
     * 
     * */
    function specialgroup_search_results(response)
    {

        var html = '' ;
        for (x in response)
        {
            var id              = response[x]['id'];
            var name            = response[x]['name'];
            var mobile_number   = response[x]['mobile_number'];
            var email           = response[x]['email'];
            var status          = response[x]['status'];
            console.log(name);
            if(status == 0)
            {
                var insert_btn = '<button type="button" class="btn btn-danger btn-sm">Staff is Disabled</button>';
            }
            else
            {
                var insert_btn = '<button type="button" class="btn btn-primary btn-sm">Insert</button>';
            }

            html +='<li class="list-group-item"><h5 style="margin: 0">'+name+' ('+mobile_number+') '+insert_btn+' </h5> </li>';
        }

        $("#specialgroup_search_results").html(html);
    }

    /*
     * end : search result insert in specialgroup_search_results
     *
     * 
     * */
</script>
<!-- end : Special Group update -->

@endsection
