@extends('layouts.student')

@section('content')
<style type="text/css">
    .navbar-brand
    {
        width:800px;
    }
</style>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->

    <!-- end breadcrumb -->
    <!-- begin page-header -->
    {{ csrf_field() }}
    <!-- end page-header -->
    <!-- start: row -->
    <div class="row">
        <!-- begin col-8 -->
        <div class="col-md-5">
            <!-- begin panel -->
            <div class="panel panel-inverse student_information" data-sortable-id="form-stuff-1">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Student's Information</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Student ID</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Student ID" name="student_id"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Photo</label>
                            <div class="col-md-8">
                                <img src="{{ asset('img/student/200x200.svg') }}" alt="200x200 image" class="img-thumbnail student_photo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Name" name="name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Father's Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Father's Name" name="fathers_name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Mother's Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Mother's Name" name="mothers_name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Date of Birth</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Date of Birth" name="date_of_birth"/>
                            </div>
                        </div>







                    </form>
                    <form class="form-horizontal col-md-6">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Marital Status</label>
                            <div class="col-md-8">
                                <select class="form-control" name="marital_status">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Gender</label>
                            <div class="col-md-8">
                                <select class="form-control" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Permanent Address</label>
                            <div class="col-md-8">
                                <textarea class="form-control" placeholder="Addessr" rows="2" name="permanent_address"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Present Address</label>
                            <div class="col-md-8">
                                <textarea class="form-control" placeholder="Present Addessr" rows="2" name="present_address"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Country</label>
                            <div class="col-md-8">
                                <select class="form-control" name="country">
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="India">India</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cell Number</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="01234567789" name="cell_number"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Alternet Number</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="01234567789" name="alternet_number"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">E-mail</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="demo@gmail.com" name="email"/>
                            </div>
                        </div>







                    </form>
                </div>
            </div>
            <!-- end panel -->
            <!-- begin panel -->
            <div class="panel panel-inverse current_semester" data-sortable-id="table-basic-5">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Current Courses</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Course Title</th>
                                <th>Credit</th>
                                <th>Semester</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>CSE151</td>
                                <td>Computer Fundamentals and Web Technology SecB</td>
                                <td>3.00</td>
                                <td>Spri 2013</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>CSE151</td>
                                <td>Computer Fundamentals and Web Technology SecB</td>
                                <td>3.00</td>
                                <td>Spri 2013</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>CSE151</td>
                                <td>Computer Fundamentals and Web Technology SecB</td>
                                <td>3.00</td>
                                <td>Spri 2013</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>CSE151</td>
                                <td>Computer Fundamentals and Web Technology SecB</td>
                                <td>3.00</td>
                                <td>Spri 2013</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>CSE151</td>
                                <td>Computer Fundamentals and Web Technology SecB</td>
                                <td>3.00</td>
                                <td>Spri 2013</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>CSE151</td>
                                <td>Computer Fundamentals and Web Technology SecB</td>
                                <td>3.00</td>
                                <td>Spri 2013</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>CSE151</td>
                                <td>Computer Fundamentals and Web Technology SecB</td>
                                <td>3.00</td>
                                <td>Spri 2013</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
            <div class="panel panel-inverse hide" data-sortable-id="ui-buttons-1"->
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">FPS - Finger Print Scanning</h4>
                </div>
                <div class="panel-body">
                    <button type="button" class="btn btn-primary m-r-5 m-b-5 GetProfileLinkByFPS">Profile View by FPS Scanning</button>
                    <button type="button" class="btn btn-success m-r-5 m-b-5">Success</button>
                </div>
            </div>
        </div>
        <!-- end col-8 -->
        <!-- begin col-6 -->
        <div class="col-md-7">
            <!-- begin panel -->
            <div class="panel panel-inverse academic_information" data-sortable-id="table-basic-4">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Academic Result</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Course Title</th>
                            <th>Credit</th>
                            <th>Letter Grade</th>
                            <th>Earned Credit</th>
                            <th>Grade Point</th>
                            <th>Semester</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CSE151</td>
                            <td>Computer Fundamentals and Web Technology SecB</td>
                            <td>3.00</td>
                            <td>A+</td>
                            <td>3.00</td>
                            <td>4.00</td>
                            <td>Spri 2013</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-6 -->
    </div>
    <!-- end: row -->
</div>
<!-- end #content -->
<!-- start : student registration -->
<script>
    $(document).ready(function() {
        /*
         * end : get student profile link BY FPS scanning
         * */
        $(document).on('click', '.GetProfileLinkByFPS', function()
        {
            var _token = $("input[name=_token]").val();

            var info = {

                _token : _token
            };

            request.method   = "POST"       	            ;
            request.route    = 'student/profile/link/get'   ;
            request.action   = ''          	                ;
            request.data     = info                         ;
            request.sync     = false		                ;

            var response = ajaxapp.request();

            if(response != null)
            {
                setTimeout(function(){ ajaxapp.notify.text('You are redirecting to your profile') },10);
                setTimeout(function(){ window.open(response) },2000);
            }
        });
        /*
         * end : get student profile link by FPS by scanning
         * */
        setTimeout(function(){ GetStudent(); }, 5000);//initial startup
    });



    /*
     * end : get student
     * */
    function GetStudent()
    {
        var _token = $("input[name=_token]").val();

        var info = {

            _token : _token
        };

        request.method   = "POST"                ;
        request.route    = 'student/get/ByFPS'   ;
        request.action   = ''          	         ;
        request.data     = info                  ;
        request.sync     = false		         ;

        var response = ajaxapp.request('setTimeout(function(){ $.gritter.removeAll(); }, 700)');

        if(response)
        {
            var e = ".student_information" ;

            $(e+" input[name=student_id]").val(response.student_id);
            $(e+" .student_photo").attr('src',response.photo);
            $(e+" input[name=name]").val(response.name);
            $(e+" input[name=fathers_name]").val(response.fathers_name);
            $(e+" input[name=mothers_name]").val(response.mothers_name);
            $(e+" input[name=date_of_birth]").val(response.date_of_birth);
            $(e+" select[name=marital_status]").val(response.marital_status);
            $(e+" select[name=gender]").val(response.gender);
            $(e+" input[name=permanent_address]").val(response.permanent_address);
            $(e+" input[name=present_address]").val(response.present_address);
            $(e+" select[name=country]").val(response.country);
            $(e+" input[name=cell_number]").val(response.cell_number);
            $(e+" input[name=alternet_number]").val(response.alternet_number);
            $(e+" input[name=email]").val(response.email);

            $(".header .student_name").text(response.name);
            $(".header .navbar-user img").attr('src',response.photo);


            $("table tbody").empty();//empty all table

            /*
            * start : academic information
            * */
            var ai =".academic_information" ;

            if(response['academic'])
            {
                var i= 0 ;
                for (i= 0; i < response['academic'].length;  i++)
                {

                    var student_id      = response['academic'][i]['student_id'] ;
                    var course_name     = response['academic'][i]['course_name'] ;
                    var course_code     = response['academic'][i]['course_code'] ;
                    var course_credit   = response['academic'][i]['course_credit'] ;
                    var semester        = response['academic'][i]['semester'] ;
                    var year            = response['academic'][i]['year'] ;
                    var grade_point     = response['academic'][i]['grade_point'] ;
                    var letter_grade    = response['academic'][i]['letter_grade'] ;

                    var earn_credit = 0.00 ;

                    if (!grade_point)
                    {
                        var earn_credit = course_credit ;
                    }

                    var html = '' ;

                    html += '<tr>';
                    html +=    '<td>'+i+'</td>';
                    html +=    '<td>'+course_code+'</td>';
                    html +=    '<td>'+course_name+'</td>';
                    html +=    '<td>'+course_credit+'</td>';
                    html +=    '<td>'+letter_grade+'</td>';
                    html +=    '<td>'+earn_credit+'</td>';
                    html +=    '<td>'+grade_point+'</td>';
                    html +=    '<td>'+semester+' '+year+'</td>';
                    html += '</tr>';

                    $(ai+" table tbody").append(html);
                }
            }
            /*
             * end : academic information
             * */

            /*
            * start : current semester
            * */
            var cs =".current_semester" ;

            if(response['current_semester'])
            {
                var i= 0 ;
                for (i= 0; i < response['current_semester'].length;  i++)
                {

                    var student_id      = response['current_semester'][i]['student_id'] ;
                    var course_name     = response['current_semester'][i]['course_name'] ;
                    var course_code     = response['current_semester'][i]['course_code'] ;
                    var course_credit   = response['current_semester'][i]['course_credit'] ;
                    var semester        = response['current_semester'][i]['semester'] ;
                    var year            = response['current_semester'][i]['year'] ;

                    var html = '' ;

                    html += '<tr>';
                    html +=    '<td>'+i+'</td>';
                    html +=    '<td>'+course_code+'</td>';
                    html +=    '<td>'+course_name+'</td>';
                    html +=    '<td>'+course_credit+'</td>';
                    html +=    '<td>'+semester+' '+year+'</td>';
                    html += '</tr>';

                    $(cs+" table tbody").append(html);
                }
            }
            /*
             * end : current semester
             * */


            //$(e+" input[name=demo_student_id_disabled]").val(response.student_id);

            //$(e+" .search").addClass('hide');
            //$(e+" .student_info").removeClass('hide');
        }
        setTimeout(function(){ GetStudent(); }, 1000);//next execution
    };
    /*
     * end : get student
     * */
</script>
<!-- end : student registration -->

@endsection
