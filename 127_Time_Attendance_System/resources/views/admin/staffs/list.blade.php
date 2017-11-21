@extends('layouts.admin')

@section('content')
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Dashboard <small>header small text goes here...</small></h1>
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
                    <h4 class="panel-title">Staff List</h4>
                </div>
                <div class="panel-body">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($staffs as $key => $value)
                            {
                            
                            echo '
                            <tr class="odd gradeX">
                                <td>'.$value->name.'</td>
                                <td>'.$value->mobile_number.'</td>
                                <td>'.$value->email.'</td>
                                <td>'.($value->status ? 'Enable' : 'Disabled').'</td>
                                <td>
                                    <div class="btn-group btn-group">
                                        <a href="'.url("/admin/staffs/profile/{$value->id}/view").'" class="btn btn-primary active"><i class="fa fa-cog"></i> View Profile</a>
                                        <a href="'.url("/admin/staffs/profile/{$value->id}/update").'" class="btn btn-success"><i class="fa fa-edit"></i> Update Profile</a>
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
         * Start : Finger print status retrieve
         * */

        var ExecutionTime       = 50000   ; //50 seconds
        var TimeExpand          = 0       ;
        var ExecutionInterval   = 1000    ;
        var FPS_StatusGetCon    = false   ; // Get Continuously FPS Status - value - true = continuous get
        var FPS_StatusSetClear  = false   ;
        /*
        * SyncProcedure - Synchronization Procedure
        *
        * Single time retrieve or multitime retrieve
        * pass value value - boolean
        * */
        FPS_Running = false;

        function FPS_Status()
        {
            if(FPS_StatusGetCon == true)
            {
                if(FPS_Running == false) // if new FPS_Status create then TimeExpand set to 0
                {
                    FPS_StatusGet();

                    if(TimeExpand <= ExecutionTime)
                    {
                        TimeExpand += ExecutionInterval;
                        FPS_Running = true;

                        var t = setTimeout(function(){
                            FPS_Running = false;
                            FPS_Status();
                        } , ExecutionInterval);

                    }
                    else //set the default value
                    {
                        TimeExpand          = 0     ;
                        FPS_StatusGetCon    = false ;
                    }
                }
                else
                {
                    TimeExpand = 0 ;
                }
            }
            else //set the default value
            {
                TimeExpand          = 0     ;
                FPS_StatusGetCon    = false ;
            }
        }

        function FPS_StatusGet()
        {
            var _token = $("input[name=_token]").val();

            var info = {

                _token : _token
            };

            request.method   = "POST"       	            ;
            request.route    = 'admin/FPS_ScanningStatus'   ;
            request.action   = ''          	                ;
            request.data     = info                         ;
            request.sync     = true		                    ;

            ajaxapp.request('$(".FingerPrintStatus").html(return_data)');

            (FPS_StatusSetClear == true) ? FPS_StatusClear() : '' ;
            FPS_StatusSetClear = false ;
        }
        /*
         * end : Finger print status retrieve
         * */
        function FPS_StatusClear()
        {
            var _token = $("input[name=_token]").val();

            var info = {

                _token : _token
            };

            request.method   = "POST"       	            ;
            request.route    = 'admin/FPS_ScanningStatusClear'   ;
            request.action   = ''          	                ;
            request.data     = info                         ;
            request.sync     = false		                ;

            var response = ajaxapp.request();

            if(response != null)
            {
                $(".FingerPrintStatus").html(response);
            }
        }
        /*
         * end : Finger print status clear
         * */

        /*
         * Start : Student Search
         * */

        $(".form_demo_update").on('click','.demo_student_search_btn',function()
        {
            var _token              = $("input[name=_token]").val();
            var student_id          = $(".form_demo_update input[name=demo_student_id]").val();

            var StudentInfo = {

                _token              : _token ,
                student_id          : student_id
            };

            request.method   = "POST"       	        ;
            request.route    = 'admin/student/search'   ;
            request.action   = ''          	            ;
            request.data     = StudentInfo              ;
            request.sync     = false		            ;

            var response = ajaxapp.request();

            if(response)
            {
                if(!response.photo)
                {
                    var photo = 'public/200x200.svg';
                }
                else
                {
                    var  photo = response.photo;
                }
                response.photo = (response.photo)? response.photo : 'public/200x200.svg' ;
                $(".form_demo_update input[name=demo_student_id_disabled]").val(response.student_id);
                $(".form_demo_update input[name=demo_student_name]").val(response.name);
                $(".form_demo_update .demo_student_photo").attr('src', ajaxapp.baseUrl+'/local/storage/app/'+photo);
                $(".form_demo_update input[name=demo_fathers_name]").val(response.fathers_name);
                $(".form_demo_update input[name=demo_mothers_name]").val(response.mothers_name);
                $(".form_demo_update input[name=demo_date_of_birth]").val(response.date_of_birth);
                $(".form_demo_update select[name=demo_marital_status]").val(response.marital_status);
                $(".form_demo_update select[name=demo_gender]").val(response.gender);
                $(".form_demo_update textarea[name=demo_permanent_address]").val(response.permanent_address);
                $(".form_demo_update textarea[name=demo_presemt_address]").val(response.present_address);
                $(".form_demo_update select[name=demo_country]").val(response.country);
                $(".form_demo_update input[name=demo_cell_number]").val(response.cell_number);
                $(".form_demo_update input[name=demo_alternet_number]").val(response.alternet_number);
                $(".form_demo_update input[name=demo_email]").val(response.email);

                $(".form_demo_update .search").addClass('hide');
                $(".form_demo_update .student_info").removeClass('hide');
            }
        });

        /*
         * End : Student search
         * */

        /*
        * Start : Back Button
        * */
        $(".form_demo_update").on('click','.student_info .back',function()
        {
            $(".form_demo_update .search").removeClass('hide');
            $(".form_demo_update .student_info").addClass('hide');
        });
        /*
         * End : Back Button
         * */


        /*
         * Start : Student Update
         * */

        $(".form_demo_update").on('click','.demo_student_update',function()
        {
            var _token              = $("input[name=_token]").val();
            var student_id          = $(".form_demo_update input[name=demo_student_id]").val();
            var name                = $(".form_demo_update input[name=demo_student_name]").val();
            var fathers_name        = $(".form_demo_update input[name=demo_fathers_name]").val();
            var mothers_name        = $(".form_demo_update input[name=demo_mothers_name]").val();
            var date_of_birth       = $(".form_demo_update input[name=demo_date_of_birth]").val();
            var marital_status      = $(".form_demo_update select[name=demo_marital_status]").val();
            var gender              = $(".form_demo_update select[name=demo_gender]").val();
            var permanent_address   = $(".form_demo_update textarea[name=demo_permanent_address]").val();
            var presemt_address     = $(".form_demo_update textarea[name=demo_presemt_address]").val();
            var country             = $(".form_demo_update select[name=demo_country]").val();
            var cell_number         = $(".form_demo_update input[name=demo_cell_number]").val();
            var alternet_number     = $(".form_demo_update input[name=demo_alternet_number]").val();
            var email               = $(".form_demo_update input[name=demo_email]").val();

            var StudentInfo = {

                _token              : _token ,
                student_id          : student_id ,
                name                : name ,
                fathers_name        : fathers_name ,
                mothers_name        : mothers_name ,
                date_of_birth       : date_of_birth ,
                marital_status      : marital_status ,
                gender              : gender ,
                permanent_address   : permanent_address ,
                presemt_address     : presemt_address ,
                country             : country ,
                cell_number         : cell_number ,
                alternet_number     : alternet_number ,
                email               : email
            };

            request.method   = "POST"       	        ;
            request.route    = 'admin/student/update'   ;
            request.action   = ''          	            ;
            request.data     = StudentInfo              ;
            request.sync     = true		                ;

            var response = ajaxapp.request('$("#modal-alert-update").modal("show");','');
        });

        /*
        * End : Student Update
        * */





        /*
         * Start : Student Search for academic info
         * */
        function AcademicSearch()
        {
            var e = '.form_demo_update_academic';

            var _token              = $("input[name=_token]").val();
            var student_id          = $(e+" input[name=demo_student_id]").val();

            var StudentInfo = {

                _token              : _token ,
                student_id          : student_id
            };

            request.method   = "POST"       	        ;
            request.route    = 'admin/student/search'   ;
            request.action   = ''          	            ;
            request.data     = StudentInfo              ;
            request.sync     = false		            ;

            var response = ajaxapp.request();

            if(response)
            {
                $(e+" table tbody").empty();

                if(response['academic']) {
                    var i = 0;
                    for (i = 0; i < response['academic'].length; i++) {

                        var student_id = response['academic'][i]['student_id'];
                        var course_name = response['academic'][i]['course_name'];
                        var course_code = response['academic'][i]['course_code'];
                        var course_credit = response['academic'][i]['course_credit'];
                        var semester = response['academic'][i]['semester'];
                        var year = response['academic'][i]['year'];
                        var letter_grade = response['academic'][i]['letter_grade'];
                        var grade_point = response['academic'][i]['grade_point'];

                        var html = '';

                        html += '<tr>';
                        html += '<td>' + i + '</td>';
                        html += '<td>' + course_code + '</td>';
                        html += '<td>' + course_name + '</td>';
                        html += '<td>' + course_credit + '</td>';
                        html += '<td>' + letter_grade + '</td>';
                        html += '<td>' + course_credit + '</td>';
                        html += '<td>' + grade_point + '</td>';
                        html += '<td>' + semester + ' ' + year + '</td>';
                        html += '</tr>';

                        $(e + " table tbody").append(html);
                    }
                }

                $(e+" input[name=demo_student_id_disabled]").val(response.student_id);

                $(e+" .search").addClass('hide');
                $(e+" .student_info").removeClass('hide');
            }
        }

        $(".form_demo_update_academic").on('click','.demo_student_search_btn',function()
        {
            AcademicSearch();
        });

        /*
         * End : Student search for academic info
         * */

        /*
         * Start : Back Button
         * */
        $(".form_demo_update_academic").on('click','.student_info .back',function()
        {
            $(".form_demo_update_academic .search").removeClass('hide');
            $(".form_demo_update_academic .student_info").addClass('hide');
        });
        /*
         * End : Back Button
         * */


        /*
         * Start : Student Academic Info insert
         * */

        $(".form_demo_update_academic").on('click','.demo_student_update',function()
        {
            var e = '.form_demo_update_academic' ;

            var _token              = $("input[name=_token]").val();

            var student_id      = $(e+" input[name=demo_student_id]").val();
            var course_code     = $(e+" select[name=demo_course]").val();
            var course_name     = $(e+" select[name=demo_course] option[value="+course_code+"]").text();
            var course_credit   = $(e+" select[name=demo_course] option[value="+course_code+"]").attr('credit');
            var semester        = $(e+" select[name=semester]").val();
            var year            = $(e+" select[name=year]").val();
            var grade_point     = $(e+" input[name=demo_grade_point]").val();

            var info = {

                _token          : _token,
                student_id      : student_id,
                course_name     : course_name,
                course_code     : course_code,
                course_credit   : course_credit,
                semester        : semester,
                year            : year,
                grade_point     : grade_point
            };

            request.method   = "POST"       	                ;
            request.route    = 'admin/student/academic/insert'  ;
            request.action   = ''          	                    ;
            request.data     = info                             ;
            request.sync     = false		                    ;

            var response = ajaxapp.request('$("#modal-alert-update").modal("show");','');
            AcademicSearch();
        });

        /*
         * End : Student Academic Info insert
         * */


        /*
        * start: student photo upload
        * */
        $(".student_info").on("change","input[type=file]",function(){
            var this_el=$(this);

            var _token      = $("input[name=_token]").val();
            var student_id  = $(".form_demo_update input[name=demo_student_id]").val();


            var file = this.files[0];
            name = file.name;
            size = file.size;
            type = file.type;

            if(file.name.length < 1) {}
            else if(file.size > 150000) {alert("The system will not take more then 150KB image size - 200x200px.");}//50000 = 50KB
            else if(file.type != 'image/png' && file.type != 'image/jpg' && !file.type != 'image/gif' && file.type != 'image/jpeg' ) {alert("This file is not image file.\n Please upload optimized jpg or png");}
            else {

                var formdata = false;
                if (window.FormData) {formdata = new FormData();}

                formdata.append("imgfile", file);
                formdata.append("_token", _token);
                formdata.append("student_id", student_id);

                jQuery.ajax({

                    url: "admin/student/update/photo",
                    type: "POST",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        var res = JSON.parse(data);

                        var x,i=1;
                        for(x in res['Message'].text)
                        {
                            ajaxapp.notify.text(res['Message'].text[x]);
                        }

                        if(res['SuccessStatus']==1)
                        {
                            return_data = res['ResponseData'] ;
                            $(".form_demo_update .demo_student_photo").attr('src', return_data);

                        }
                    }
                });
            }

        });
        /*
         * end: student photo upload
         * */






        /*
         * Start : Student Search for current semester
         * */
        function CurrentSemesterSearch()
        {
            var e = '.form_demo_update_current_semester';

            var _token              = $("input[name=_token]").val();
            var student_id          = $(e+" input[name=demo_student_id]").val();

            var StudentInfo = {

                _token              : _token ,
                student_id          : student_id
            };

            request.method   = "POST"       	        ;
            request.route    = 'admin/student/search'   ;
            request.action   = ''          	            ;
            request.data     = StudentInfo              ;
            request.sync     = false		            ;

            var response = ajaxapp.request();

            if(response)
            {
                $(e+" table tbody").empty();

                if(response['current_semester'])
                {
                    var i = 0;
                    for (i = 0; i < response['current_semester'].length; i++) {

                        var student_id = response['current_semester'][i]['student_id'];
                        var course_name = response['current_semester'][i]['course_name'];
                        var course_code = response['current_semester'][i]['course_code'];
                        var course_credit = response['current_semester'][i]['course_credit'];
                        var semester = response['current_semester'][i]['semester'];
                        var year = response['current_semester'][i]['year'];

                        var html = '';

                        html += '<tr>';
                        html += '<td>' + i + '</td>';
                        html += '<td>' + course_code + '</td>';
                        html += '<td>' + course_name + '</td>';
                        html += '<td>' + course_credit + '</td>';
                        html += '<td>' + semester + ' ' + year + '</td>';
                        html += '</tr>';

                        $(e + " table tbody").append(html);
                    }
                }

                $(e+" input[name=demo_student_id_disabled]").val(response.student_id);

                $(e+" .search").addClass('hide');
                $(e+" .student_info").removeClass('hide');
            }
        }

        $(".form_demo_update_current_semester").on('click','.demo_student_search_btn',function()
        {
            CurrentSemesterSearch();
        });

        /*
         * End : Student search for current semester
         * */

        /*
         * Start : Back Button current semester
         * */
        $(".form_demo_update_current_semester").on('click','.student_info .back',function()
        {
            $(".form_demo_update_current_semester .search").removeClass('hide');
            $(".form_demo_update_current_semester .student_info").addClass('hide');
        });
        /*
         * End : Back Button current semester
         * */


        /*
         * Start : Student current semester insert
         * */

        $(".form_demo_update_current_semester").on('click','.demo_student_update',function()
        {
            var e = '.form_demo_update_current_semester' ;

            var _token              = $("input[name=_token]").val();

            var student_id      = $(e+" input[name=demo_student_id]").val();
            var course_code     = $(e+" select[name=demo_course]").val();
            var course_name     = $(e+" select[name=demo_course] option[value="+course_code+"]").text();
            var course_credit   = $(e+" select[name=demo_course] option[value="+course_code+"]").attr('credit');
            var semester        = $(e+" select[name=semester]").val();
            var year            = $(e+" select[name=year]").val();

            var info = {

                _token          : _token,
                student_id      : student_id,
                course_name     : course_name,
                course_code     : course_code,
                course_credit   : course_credit,
                semester        : semester,
                year            : year
            };

            request.method   = "POST"       	                        ;
            request.route    = 'admin/student/current_semester/insert'  ;
            request.action   = ''          	                            ;
            request.data     = info                                     ;
            request.sync     = false		                            ;

            var response = ajaxapp.request('$("#modal-alert-update").modal("show");','');
            CurrentSemesterSearch();
        });

        /*
         * End : Student current semester insert
         * */
    });
</script>
<!-- end : staff registration -->

@endsection
