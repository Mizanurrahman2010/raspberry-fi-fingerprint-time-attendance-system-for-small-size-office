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
    <h1 class="page-header">Staff Registration <small> Staff Registration</small></h1>
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
                    <h4 class="panel-title">Office Staff Registration</h4>
                </div>
                <div class="panel-body">
                    <form action="#" method="POST" name="" class="form-horizontal form_registration">
                        <div id="">

                            <!-- begin wizard step-1 -->
                            <div class="step-1">

                            </div>
                            <fieldset>
                                <legend class="pull-left width-full">Office Staff Registration</legend>
                                <!-- begin row -->
                                <div class="row">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="designation" class="col-md-4 control-label">Department</label>

                                        <div class="col-md-6">
                                            <select class="form-control" name="department" required autofocus>
                                                @foreach ($departments as $department)
                                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="designation" class="col-md-4 control-label">Designation</label>

                                        <div class="col-md-6">
                                            <select class="form-control" name="designation" required autofocus>
                                                @foreach ($staff_designations as $designation)
                                                    <option value="{{$designation->id}}">{{$designation->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="joining_date" class="col-md-4 control-label">Joining Date</label>

                                        <div class="col-md-6">
                                            <select aria-label="Day" name="joining_date_day" title="Day" class="form-control input-inline">
                                                <option value="0">Day</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                            <select aria-label="Month" name="joining_date_month" title="Month" class="form-control input-inline">
                                                <option value="0">Month</option>
                                                <option value="1">Jan</option>
                                                <option value="2">Feb</option>
                                                <option value="3">Mar</option>
                                                <option value="4">Apr</option>
                                                <option value="5">May</option>
                                                <option value="6">Jun</option>
                                                <option value="7">Jul</option>
                                                <option value="8">Aug</option>
                                                <option value="9">Sept</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>
                                            </select>
                                            <select aria-label="Year" name="joining_date_year" title="Year" class="form-control input-inline">
                                                <option value="0">Year</option>
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                                <option value="2015">2015</option>
                                                <option value="2014">2014</option>
                                                <option value="2013">2013</option>
                                                <option value="2012">2012</option>
                                                <option value="2011">2011</option>
                                                <option value="2010">2010</option>
                                                <option value="2009">2009</option>
                                                <option value="2008">2008</option>
                                                <option value="2007">2007</option>
                                                <option value="2006">2006</option>
                                                <option value="2005">2005</option>
                                                <option value="2004">2004</option>
                                                <option value="2003">2003</option>
                                                <option value="2002">2002</option>
                                                <option value="2001">2001</option>
                                                <option value="2000">2000</option>
                                                <option value="1999">1999</option>
                                                <option value="1998">1998</option>
                                                <option value="1997">1997</option>
                                                <option value="1996">1996</option>
                                                <option value="1995">1995</option>
                                                <option value="1994">1994</option>
                                                <option value="1993">1993</option>
                                                <option value="1992">1992</option>
                                                <option value="1991">1991</option>
                                                <option value="1990">1990</option>
                                                <option value="1989">1989</option>
                                                <option value="1988">1988</option>
                                                <option value="1987">1987</option>
                                                <option value="1986">1986</option>
                                                <option value="1985">1985</option>
                                                <option value="1984">1984</option>
                                                <option value="1983">1983</option>
                                                <option value="1982">1982</option>
                                                <option value="1981">1981</option>
                                                <option value="1980">1980</option>
                                                <option value="1979">1979</option>
                                                <option value="1978">1978</option>
                                                <option value="1977">1977</option>
                                                <option value="1976">1976</option>
                                                <option value="1975">1975</option>
                                                <option value="1974">1974</option>
                                                <option value="1973">1973</option>
                                                <option value="1972">1972</option>
                                                <option value="1971">1971</option>
                                                <option value="1970">1970</option>
                                                <option value="1969">1969</option>
                                                <option value="1968">1968</option>
                                                <option value="1967">1967</option>
                                                <option value="1966">1966</option>
                                                <option value="1965">1965</option>
                                                <option value="1964">1964</option>
                                                <option value="1963">1963</option>
                                                <option value="1962">1962</option>
                                                <option value="1961">1961</option>
                                                <option value="1960">1960</option>
                                                <option value="1959">1959</option>
                                                <option value="1958">1958</option>
                                                <option value="1957">1957</option>
                                                <option value="1956">1956</option>
                                                <option value="1955">1955</option>
                                                <option value="1954">1954</option>
                                                <option value="1953">1953</option>
                                                <option value="1952">1952</option>
                                                <option value="1951">1951</option>
                                                <option value="1950">1950</option>
                                                <option value="1949">1949</option>
                                                <option value="1948">1948</option>
                                                <option value="1947">1947</option>
                                                <option value="1946">1946</option>
                                                <option value="1945">1945</option>
                                                <option value="1944">1944</option>
                                                <option value="1943">1943</option>
                                                <option value="1942">1942</option>
                                                <option value="1941">1941</option>
                                                <option value="1940">1940</option>
                                                <option value="1939">1939</option>
                                                <option value="1938">1938</option>
                                                <option value="1937">1937</option>
                                                <option value="1936">1936</option>
                                                <option value="1935">1935</option>
                                                <option value="1934">1934</option>
                                                <option value="1933">1933</option>
                                                <option value="1932">1932</option>
                                                <option value="1931">1931</option>
                                                <option value="1930">1930</option>
                                                <option value="1929">1929</option>
                                                <option value="1928">1928</option>
                                                <option value="1927">1927</option>
                                                <option value="1926">1926</option>
                                                <option value="1925">1925</option>
                                                <option value="1924">1924</option>
                                                <option value="1923">1923</option>
                                                <option value="1922">1922</option>
                                                <option value="1921">1921</option>
                                                <option value="1920">1920</option>
                                                <option value="1919">1919</option>
                                                <option value="1918">1918</option>
                                                <option value="1917">1917</option>
                                                <option value="1916">1916</option>
                                                <option value="1915">1915</option>
                                                <option value="1914">1914</option>
                                                <option value="1913">1913</option>
                                                <option value="1912">1912</option>
                                                <option value="1911">1911</option>
                                                <option value="1910">1910</option>
                                                <option value="1909">1909</option>
                                                <option value="1908">1908</option>
                                                <option value="1907">1907</option>
                                                <option value="1906">1906</option>
                                                <option value="1905">1905</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="current_status" class="col-md-4 control-label">Current Status</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="current_status" required autofocus>
                                                @foreach ($staff_status as $status)
                                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="username" class="col-md-4 control-label">Username</label>
                                        <div class="col-md-6">
                                            <input id="username" type="text" class="form-control" name="username" value="" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="col-md-4 control-label">Password</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="mobile_number" class="col-md-4 control-label">Mobile Number</label>
                                        <div class="col-md-6">
                                            <input id="mobile_number" type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-md-4 control-label">Birthday</label>
                                        <div class="col-md-6">
                                            <select aria-label="Day" name="birthday_day" id="day" title="Day" class="form-control input-inline">
                                                <option value="0">Day</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                            <select aria-label="Month" name="birthday_month" id="month" title="Month" class="form-control input-inline">
                                                <option value="0">Month</option>
                                                <option value="1">Jan</option>
                                                <option value="2">Feb</option>
                                                <option value="3">Mar</option>
                                                <option value="4">Apr</option>
                                                <option value="5">May</option>
                                                <option value="6">Jun</option>
                                                <option value="7">Jul</option>
                                                <option value="8">Aug</option>
                                                <option value="9">Sept</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>
                                            </select>
                                            <select aria-label="Year" name="birthday_year" id="year" title="Year" class="form-control input-inline">
                                                <option value="0">Year</option>
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                                <option value="2015">2015</option>
                                                <option value="2014">2014</option>
                                                <option value="2013">2013</option>
                                                <option value="2012">2012</option>
                                                <option value="2011">2011</option>
                                                <option value="2010">2010</option>
                                                <option value="2009">2009</option>
                                                <option value="2008">2008</option>
                                                <option value="2007">2007</option>
                                                <option value="2006">2006</option>
                                                <option value="2005">2005</option>
                                                <option value="2004">2004</option>
                                                <option value="2003">2003</option>
                                                <option value="2002">2002</option>
                                                <option value="2001">2001</option>
                                                <option value="2000">2000</option>
                                                <option value="1999">1999</option>
                                                <option value="1998">1998</option>
                                                <option value="1997">1997</option>
                                                <option value="1996">1996</option>
                                                <option value="1995">1995</option>
                                                <option value="1994">1994</option>
                                                <option value="1993">1993</option>
                                                <option value="1992">1992</option>
                                                <option value="1991">1991</option>
                                                <option value="1990">1990</option>
                                                <option value="1989">1989</option>
                                                <option value="1988">1988</option>
                                                <option value="1987">1987</option>
                                                <option value="1986">1986</option>
                                                <option value="1985">1985</option>
                                                <option value="1984">1984</option>
                                                <option value="1983">1983</option>
                                                <option value="1982">1982</option>
                                                <option value="1981">1981</option>
                                                <option value="1980">1980</option>
                                                <option value="1979">1979</option>
                                                <option value="1978">1978</option>
                                                <option value="1977">1977</option>
                                                <option value="1976">1976</option>
                                                <option value="1975">1975</option>
                                                <option value="1974">1974</option>
                                                <option value="1973">1973</option>
                                                <option value="1972">1972</option>
                                                <option value="1971">1971</option>
                                                <option value="1970">1970</option>
                                                <option value="1969">1969</option>
                                                <option value="1968">1968</option>
                                                <option value="1967">1967</option>
                                                <option value="1966">1966</option>
                                                <option value="1965">1965</option>
                                                <option value="1964">1964</option>
                                                <option value="1963">1963</option>
                                                <option value="1962">1962</option>
                                                <option value="1961">1961</option>
                                                <option value="1960">1960</option>
                                                <option value="1959">1959</option>
                                                <option value="1958">1958</option>
                                                <option value="1957">1957</option>
                                                <option value="1956">1956</option>
                                                <option value="1955">1955</option>
                                                <option value="1954">1954</option>
                                                <option value="1953">1953</option>
                                                <option value="1952">1952</option>
                                                <option value="1951">1951</option>
                                                <option value="1950">1950</option>
                                                <option value="1949">1949</option>
                                                <option value="1948">1948</option>
                                                <option value="1947">1947</option>
                                                <option value="1946">1946</option>
                                                <option value="1945">1945</option>
                                                <option value="1944">1944</option>
                                                <option value="1943">1943</option>
                                                <option value="1942">1942</option>
                                                <option value="1941">1941</option>
                                                <option value="1940">1940</option>
                                                <option value="1939">1939</option>
                                                <option value="1938">1938</option>
                                                <option value="1937">1937</option>
                                                <option value="1936">1936</option>
                                                <option value="1935">1935</option>
                                                <option value="1934">1934</option>
                                                <option value="1933">1933</option>
                                                <option value="1932">1932</option>
                                                <option value="1931">1931</option>
                                                <option value="1930">1930</option>
                                                <option value="1929">1929</option>
                                                <option value="1928">1928</option>
                                                <option value="1927">1927</option>
                                                <option value="1926">1926</option>
                                                <option value="1925">1925</option>
                                                <option value="1924">1924</option>
                                                <option value="1923">1923</option>
                                                <option value="1922">1922</option>
                                                <option value="1921">1921</option>
                                                <option value="1920">1920</option>
                                                <option value="1919">1919</option>
                                                <option value="1918">1918</option>
                                                <option value="1917">1917</option>
                                                <option value="1916">1916</option>
                                                <option value="1915">1915</option>
                                                <option value="1914">1914</option>
                                                <option value="1913">1913</option>
                                                <option value="1912">1912</option>
                                                <option value="1911">1911</option>
                                                <option value="1910">1910</option>
                                                <option value="1909">1909</option>
                                                <option value="1908">1908</option>
                                                <option value="1907">1907</option>
                                                <option value="1906">1906</option>
                                                <option value="1905">1905</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="current_address" class="col-md-4 control-label">Country</label>
                                        <div class="col-md-6">
                                            <select class="form-control input-inline" name="country">
                                                <option value="18" selected="">Bangldesh</option>
                                                <option value="99">India</option>
                                                <option value="223">USA</option>
                                                <option value="44">China</option>
                                                <option value="113">Korea</option>
                                                <option value="114">Kuwait</option>
                                                <option value="162">Pakistan</option>
                                                <option value="196">Srilaka</option>
                                                <option value="222">UK</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="current_address" class="col-md-4 control-label">Current Address</label>
                                        <div class="col-md-6">
                                            <input id="current_address" type="text" class="form-control" name="current_address" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="permanent_address" class="col-md-4 control-label">Permanent Address</label>
                                        <div class="col-md-6">
                                            <input id="permanent_address" type="text" class="form-control" name="permanent_address" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
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
                            <button type="button" class="btn btn-primary center-block btn_registration">Register<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></button>
                            <!-- end wizard step-1 -->

                            <!-- #modal-alert -->
                            <div class="modal fade" id="modal-alert">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Staff Creation</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-success m-b-0">
                                                <h4><i class="fa fa-info-circle"></i> Successfully Staff Created</h4>
                                                <p>You update / delete/ / view staff info</p>
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

        $(".form_registration").on('click','.btn_registration',function()
        {
            var _token                  = $("input[name=_token]").val();
            var name                    = $(".form_registration input[name=name]").val();
            var department              = $(".form_registration select[name=department]").val();
            var designation             = $(".form_registration select[name=designation]").val();

            var joining_date_day        = $(".form_registration select[name=joining_date_day]").val();
            var joining_date_month      = $(".form_registration select[name=joining_date_month]").val();
            var joining_date_year       = $(".form_registration select[name=joining_date_year]").val();

            var current_status          = $(".form_registration select[name=current_status]").val();
            var username                = $(".form_registration input[name=username]").val();
            var password                = $(".form_registration input[name=password]").val();
            var mobile_number           = $(".form_registration input[name=mobile_number]").val();
            var email                   = $(".form_registration input[name=email]").val();

            var birthday_day            = $(".form_registration select[name=birthday_day]").val();
            var birthday_month          = $(".form_registration select[name=birthday_month]").val();
            var birthday_year           = $(".form_registration select[name=birthday_year]").val();

            var country                 = $(".form_registration select[name=country]").val();
            var current_address         = $(".form_registration input[name=current_address]").val();
            var permanent_address       = $(".form_registration input[name=permanent_address]").val();
            var status                  = $(".form_registration select[name=status]").val();

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

            request.method   = "POST"       	              ;
            request.route    = 'admin/staffs/registration'    ;
            request.action   = ''          	                  ;
            request.data     = info                           ;
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
