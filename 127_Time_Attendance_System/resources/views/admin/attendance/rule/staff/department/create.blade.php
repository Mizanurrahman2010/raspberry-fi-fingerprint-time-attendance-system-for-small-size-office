@extends('layouts.admin')

@section('content')
<!-- begin #content -->
<div id="content" class="content  attendance_rule_staff_department">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Attendance Rule Create</li>
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
                    <h4 class="panel-title">Attendance Rule Create</h4>
                </div>
                <div class="panel-body">
                    <form action="#" method="POST" name="" class="form-horizontal">
                        <div id="">

                            <!-- begin wizard step-1 -->
                            <div class="step-1">

                            </div>
                            <fieldset>
                                <legend class="pull-left width-full">Attendance Rule Create</legend>
                                <!-- begin row -->
                                <div class="row">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="name" class="col-md-3 control-label"> Rule Name</label>
                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control" name="name" value="Default" required autofocus>
                                        </div>
                                    </div>

                                    <!-- 
                                    <div class="form-group">
                                        <label for="current_status" class="col-md-3 control-label"> Duty On Time </label>
                                        <div class="col-md-8">
                                            
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="timepicker_duty_on_time" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                            
                                            
                                            
                                            <div class="btn-group" role="group" aria-label="...">
                                                
                                                <div class="input-group bootstrap-timepicker timepicker pull-right">
                                                    <input id="timepicker_duty_on_time" type="text" class="form-control input-small">
                                                </div>
                                                <select class="btn btn-primary" name="duty_on_time_hour">
                                                    <option value="-1">Hour</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                    <option>12</option>
                                                </select>
                                                <select class="btn btn-primary" name="duty_on_time_minute">
                                                    <option value="-1">Minute</option>
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
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
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>

                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>

                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                </select>
                                                <select class="btn btn-primary" name="duty_on_time_am_pm">
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                </select>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="current_status" class="col-md-3 control-label"> Duty Off Time </label>
                                        <div class="col-md-8">
                                            
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="timepicker_duty_off_time" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                            

                                            
                                            <div class="btn-group" role="group" aria-label="...">
                                                <select class="btn btn-danger" name="duty_off_time_hour">
                                                    <option value="-1">Hour</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                    <option>12</option>
                                                </select>
                                                <select class="btn btn-danger" name="duty_off_time_minute">
                                                    <option value="-1">Minute</option>
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
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
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>

                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>

                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                </select>
                                                <select class="btn btn-danger" name="duty_off_time_am_pm">
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="current_status" class="col-md-3 control-label">Entry Time : From </label>
                                        <div class="col-md-8">
                                            
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="timepicker_entry_time_from" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                            

                                            
                                            <div class="btn-group" role="group" aria-label="...">
                                                <select class="btn btn-primary" name="entry_time_from_hour">
                                                    <option value="-1">Hour</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                    <option>12</option>
                                                </select>
                                                <select class="btn btn-primary" name="entry_time_from_minute">
                                                    <option value="-1">Minute</option>
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
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
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>

                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>

                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                </select>
                                                <select class="btn btn-primary" name="entry_time_from_am_pm">
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="current_status" class="col-md-3 control-label">  To </label>
                                        <div class="col-md-8">
                                            
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="timepicker_entry_time_to" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                           
                                            
                                            
                                            <div class="btn-group" role="group" aria-label="...">
                                                <select class="btn btn-danger" name="entry_time_to_hour">
                                                    <option value="-1">Hour</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                    <option>12</option>
                                                </select>
                                                <select class="btn btn-danger" name="entry_time_to_minute">
                                                    <option value="-1">Minute</option>
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
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
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>

                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>

                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                </select>
                                                <select class="btn btn-danger" name="entry_time_to_am_pm">
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="current_status" class="col-md-3 control-label">Out Time : From</label>
                                        <div class="col-md-8">
                                            
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="timepicker_out_time_from" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                            
                                            
                                            
                                            <div class="btn-group" role="group" aria-label="...">
                                                <select class="btn btn-primary" name="out_time_from_hour">
                                                    <option value="-1">Hour</option>
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
                                                </select>
                                                <select class="btn btn-primary" name="out_time_from_minute">
                                                    <option value="-1">Minute</option>
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
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
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>

                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>

                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                </select>
                                                <select class="btn btn-primary" name="out_time_from_am_pm">
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="current_status" class="col-md-3 control-label">To</label>
                                        <div class="col-md-8">
                                            
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="timepicker_out_time_to" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                            
                                            
                                            
                                            <div class="btn-group" role="group" aria-label="...">
                                                <select class="btn btn-danger" name="out_time_to_hour">
                                                    <option value="-1">Hour</option>
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
                                                </select>
                                                <select class="btn btn-danger" name="out_time_to_minute">
                                                    <option value="-1">Minute</option>
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
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
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>

                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>

                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                </select>
                                                <select class="btn btn-danger" name="out_time_to_am_pm">
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="current_status" class="col-md-3 control-label">Late Duration (for fine)</label>
                                        <div class="col-md-8">
                                            <div class="btn-group" role="group" aria-label="...">
                                                <select class="btn btn-danger" name="late_duration_hour">
                                                    <option value="-1">Hour</option>
                                                    <option value="0">0</option>
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
                                                </select>
                                                <select class="btn btn-danger" name="late_duration_minute">
                                                    <option value="-1">Minute</option>
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
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
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>

                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>

                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="current_status" class="col-md-3 control-label">Early Leave Duration (for fine)</label>
                                        <div class="col-md-8">
                                            <div class="btn-group" role="group" aria-label="...">
                                                <select class="btn btn-danger" name="early_leave_duration_hour">
                                                    <option value="-1">Hour</option>
                                                    <option value="0">0</option>
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
                                                </select>
                                                <select class="btn btn-danger" name="early_leave_duration_minute">
                                                    <option value="-1">Minute</option>
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
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
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>

                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>

                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="current_status" class="col-md-3 control-label">Early Come Duration (For Bonus)</label>
                                        <div class="col-md-8">
                                            <div class="btn-group" role="group" aria-label="...">
                                                <select class="btn btn-primary" name="early_come_duration_hour">
                                                    <option value="-1">Hour</option>
                                                    <option value="0">0</option>
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
                                                </select>
                                                <select class="btn btn-primary" name="early_come_duration_minute">
                                                    <option value="-1">Minute</option>
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
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
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>

                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>

                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="current_status" class="col-md-3 control-label">Late Leave Duration (for bonus)</label>
                                        <div class="col-md-8">
                                            <div class="btn-group" role="group" aria-label="...">
                                                <select class="btn btn-primary" name="late_leave_duration_hour">
                                                    <option value="-1">Hour</option>
                                                    <option value="0">0</option>
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
                                                </select>
                                                <select class="btn btn-primary" name="late_leave_duration_minute">
                                                    <option value="-1">Minute</option>
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
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
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>

                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>

                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="current_status" class="col-md-3 control-label">Weekends</label>
                                        <div class="col-md-8">
                                            <div class="btn-group-vertical btn-group-text-left" role="group" aria-label="...">

                                                <button type="button" class="btn btn-default"> 
                                                    <div class="checkbox"><label><input type="checkbox" name="weekends[]" value="Saturday"> Saturday</label></div>
                                                </button>

                                                <button type="button" class="btn btn-default"> 
                                                    <div class="checkbox"><label><input type="checkbox" name="weekends[]" value="Sunday"> Sunday</label></div>
                                                </button>

                                                <button type="button" class="btn btn-default"> 
                                                    <div class="checkbox"><label><input type="checkbox" name="weekends[]" value="Monday"> Monday</label></div>
                                                </button>

                                                <button type="button" class="btn btn-default"> 
                                                    <div class="checkbox"><label><input type="checkbox" name="weekends[]" value="Tuesday"> Tuesday</label></div>
                                                </button>

                                                <button type="button" class="btn btn-default"> 
                                                    <div class="checkbox"><label><input type="checkbox" name="weekends[]" value="Wednesday"> Wednesday</label></div>
                                                </button>

                                                <button type="button" class="btn btn-default"> 
                                                    <div class="checkbox"><label><input type="checkbox" name="weekends[]" value="Thursday"> Thursday</label></div>
                                                </button>

                                                <button type="button" class="btn btn-default"> 
                                                    <div class="checkbox"><label><input type="checkbox" name="weekends[]" value="Friday"> Friday</label></div>
                                                </button>

                                            </div>

                                        </div>
                                    </div>
                                    -->

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
                                                    $days = [
                                                      0 => 'Sunday',
                                                      1 => 'Monday',
                                                      2 => 'Tuesday',
                                                      3 => 'Wednesday',
                                                      4 => 'Thursday',
                                                      5 => 'Friday',
                                                      6 => 'Saturday'
                                                    ];
                                                ?>
                                                @for ($i = 0; $i <= 6; $i++)
                                                <tr>
                                                    <td><div class="checkbox"><label><input type="checkbox" name="day[]" value="{{ $i }}">{{ $days[$i] }}</label></div></td>
                                                    <td>
                                                        <div class="input-group bootstrap-timepicker timepicker">
                                                            <input id="{{ $i }}[duty_on_time]" name="count_as_early_come_from[]" type="text" class="form-control input-small timepicker_c">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group bootstrap-timepicker timepicker">
                                                            <input id="{{ $i }}[duty_off_time]" name="normal_in_time_from[]" type="text" class="form-control input-small timepicker_c">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group bootstrap-timepicker timepicker">
                                                            <input id="{{ $i }}[entry_time_from]" name="on_duty_time[]" type="text" class="form-control input-small timepicker_c">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group bootstrap-timepicker timepicker">
                                                            <input id="{{ $i }}[entry_time_to]" name="normal_in_time_to[]" type="text" class="form-control input-small timepicker_c">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group bootstrap-timepicker timepicker">
                                                            <input id="{{ $i }}[out_time_from]" name="late_count_untill[]" type="text" class="form-control input-small timepicker_c">
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <div class="input-group bootstrap-timepicker timepicker">
                                                            <input id="{{ $i }}[out_time_to]" name="count_as_early_leave_from[]" type="text" class="form-control input-small timepicker_c">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group bootstrap-timepicker timepicker">
                                                            <input id="{{ $i }}[out_time_to]" name="normal_out_time_from[]" type="text" class="form-control input-small timepicker_c">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group bootstrap-timepicker timepicker">
                                                            <input id="{{ $i }}[out_time_to]" name="off_duty_time[]" type="text" class="form-control input-small timepicker_c">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group bootstrap-timepicker timepicker">
                                                            <input id="{{ $i }}[out_time_to]" name="normal_out_time_to[]" type="text" class="form-control input-small timepicker_c">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group bootstrap-timepicker timepicker">
                                                            <input id="{{ $i }}[out_time_to]" name="late_leave_count_untill[]" type="text" class="form-control input-small timepicker_c">
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                        <style type="text/css">
                                            .custom-form-control .form-control{padding: 6px 8px}
                                            .custom-form-control.table>tbody>tr>td{padding: 10px 5px}
                                        </style>
                                    </div>

                                    <!-- end : time table -->

                                    <div class="form-group">
                                        <label for="current_status" class="col-md-3 control-label">Validate From</label>
                                        <div class="col-md-8">
                                            <div class="input-group date" id="datetimepicker1">
                                                <select aria-label="Day" name="validate_from_day" title="Day" class="form-control input-inline">
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
                                                <select aria-label="Month" name="validate_from_month" title="Month" class="form-control input-inline">
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
                                                <select aria-label="Year" name="validate_from_year" title="Year" class="form-control input-inline">
                                                    <option value="0">Year</option>
                                                    @for ($i = 2020; $i >= 1905; $i--)
                                                        <option value="{{ $i }}" >{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="username" class="col-md-3 control-label">Validate To</label>
                                        <div class="col-md-8">
                                            <div class="input-group date" id="datetimepicker2">
                                                <select aria-label="Day" name="validate_to_day" title="Day" class="form-control input-inline">
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
                                                <select aria-label="Month" name="validate_to_month" title="Month" class="form-control input-inline">
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
                                                <select aria-label="Year" name="validate_to_year" title="Year" class="form-control input-inline">
                                                    <option value="0">Year</option>
                                                    @for ($i = 2020; $i >= 1905; $i--)
                                                        <option value="{{ $i }}" >{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="current_status" class="col-md-3 control-label">Department</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="department" required autofocus>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="status" class="col-md-3 control-label">Status</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="status" required autofocus>
                                                <option value="1">Enable</option>
                                                <option value="0">Disable</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <!-- end row -->
                            </fieldset>
                            <button type="button" class="btn btn-primary center-block btn_create">Create Attendance Rule <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></button>
                            <!-- end wizard step-1 -->
                            <!-- #modal-alert -->
                            <div class="modal fade" id="modal-alert">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Attendance Rule Creation</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-success m-b-0">
                                                <h4><i class="fa fa-info-circle"></i> Successfully Attendance Rule Created</h4>
                                                <p>You can update / delete/ / viewAttendance Rule info</p>
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

            <div class="input-group bootstrap-timepicker timepicker pull-right">
                <input id="timepicker31" type="text" class="form-control input-small">
            </div>
            <script type="text/javascript">
            
            $( document ).ready(function() {

                // $('#timepicker_duty_on_time').timepicker({
                //     minuteStep: 1,
                //     showInputs: false,
                //     disableFocus: true
                // });
                // $('#timepicker_duty_off_time').timepicker({
                //     minuteStep: 1,
                //     showInputs: false,
                //     disableFocus: true
                // });

                // $('#timepicker_entry_time_from').timepicker({
                //     minuteStep: 1,
                //     showInputs: false,
                //     disableFocus: true
                // });
                // $('#timepicker_entry_time_to').timepicker({
                //     minuteStep: 1,
                //     showInputs: false,
                //     disableFocus: true
                // });

                // $('#timepicker_out_time_from').timepicker({
                //     minuteStep: 1,
                //     showInputs: false,
                //     disableFocus: true
                // });
                // $('#timepicker_out_time_to').timepicker({
                //     minuteStep: 1,
                //     showInputs: false,
                //     disableFocus: true
                // });

                // $('#timepicker_normal_out_from').timepicker({
                //     minuteStep: 1,
                //     showInputs: false,
                //     disableFocus: true
                // });







                // $('#0[count_as_early_come_from]').timepicker({
                //     minuteStep: 1,
                //     showInputs: false,
                //     disableFocus: true
                // });
                // $('#0[normal_in_time_from]').timepicker({
                //     minuteStep: 1,
                //     showInputs: false,
                //     disableFocus: true
                // });
                // $('#0[on_duty_time]').timepicker({
                //     minuteStep: 1,
                //     showInputs: false,
                //     disableFocus: true
                // });
                // $('#0[normal_in_time_to]').timepicker({
                //     minuteStep: 1,
                //     showInputs: false,
                //     disableFocus: true
                // });
                // $('#0[late_count_untill]').timepicker({
                //     minuteStep: 1,
                //     showInputs: false,
                //     disableFocus: true
                // });
                // $('#0[count_as_early_leave_from]').timepicker({
                //     minuteStep: 1,
                //     showInputs: false,
                //     disableFocus: true
                // });
                // $('#0[normal_out_time_from]').timepicker({
                //     minuteStep: 1,
                //     showInputs: false,
                //     disableFocus: true
                // });
                // $('#0[off_duty_time]').timepicker({
                //     minuteStep: 1,
                //     showInputs: false,
                //     disableFocus: true
                // });
                // $('#0[normal_out_time_to]').timepicker({
                //     minuteStep: 1,
                //     showInputs: false,
                //     disableFocus: true
                // });
                // $('#0[late_leave_count_untill]').timepicker({
                //     minuteStep: 1,
                //     showInputs: false,
                //     disableFocus: true
                // });


                $('.timepicker_c').timepicker({
                    showMeridian: false,
                    minuteStep: 1,
                    showInputs: false,
                    disableFocus: true
                });








                $('#timepicker31').timepicker({
                    showMeridian: false,
                    minuteStep: 1,
                    showInputs: false,
                    disableFocus: true

                });

            });
        </script>
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

            // var duty_on_time_hour           = $(".attendance_rule_staff_department select[name=duty_on_time_hour]").val();
            // var duty_on_time_minute         = $(".attendance_rule_staff_department select[name=duty_on_time_minute]").val();
            // var duty_on_time_am_pm          = $(".attendance_rule_staff_department select[name=duty_on_time_am_pm]").val();

            // var duty_off_time_hour          = $(".attendance_rule_staff_department select[name=duty_off_time_hour]").val();
            // var duty_off_time_minute        = $(".attendance_rule_staff_department select[name=duty_off_time_minute]").val();
            // var duty_off_time_am_pm         = $(".attendance_rule_staff_department select[name=duty_off_time_am_pm]").val();

            // var entry_time_from_hour        = $(".attendance_rule_staff_department select[name=entry_time_from_hour]").val();
            // var entry_time_from_minute      = $(".attendance_rule_staff_department select[name=entry_time_from_minute]").val();
            // var entry_time_from_am_pm       = $(".attendance_rule_staff_department select[name=entry_time_from_am_pm]").val();

            // var entry_time_to_hour          = $(".attendance_rule_staff_department select[name=entry_time_to_hour]").val();
            // var entry_time_to_minute        = $(".attendance_rule_staff_department select[name=entry_time_to_minute]").val();
            // var entry_time_to_am_pm         = $(".attendance_rule_staff_department select[name=entry_time_to_am_pm]").val();

            // var out_time_from_hour          = $(".attendance_rule_staff_department select[name=out_time_from_hour]").val();
            // var out_time_from_minute        = $(".attendance_rule_staff_department select[name=out_time_from_minute]").val();
            // var out_time_from_am_pm         = $(".attendance_rule_staff_department select[name=out_time_from_am_pm]").val();

            // var out_time_to_hour            = $(".attendance_rule_staff_department select[name=out_time_to_hour]").val();
            // var out_time_to_minute          = $(".attendance_rule_staff_department select[name=out_time_to_minute]").val();
            // var out_time_to_am_pm           = $(".attendance_rule_staff_department select[name=out_time_to_am_pm]").val();
            
            // var duty_on_time                = $("#timepicker_duty_on_time").val() ;
            // var duty_off_time               = $("#timepicker_duty_off_time").val() ;
            // var entry_time_from             = $("#timepicker_entry_time_from").val() ;
            // var entry_time_to               = $("#timepicker_entry_time_to").val() ;
            // var out_time_from               = $("#timepicker_out_time_from").val() ;
            // var out_time_to                 = $("#timepicker_out_time_to").val() ;

            // var late_duration_hour          = $(".attendance_rule_staff_department select[name=late_duration_hour]").val();
            // var late_duration_minute        = $(".attendance_rule_staff_department select[name=late_duration_minute]").val();
            // var early_leave_duration_hour   = $(".attendance_rule_staff_department select[name=early_leave_duration_hour]").val();
            // var early_leave_duration_minute = $(".attendance_rule_staff_department select[name=early_leave_duration_minute]").val();

            // var early_come_duration_hour    = $(".attendance_rule_staff_department select[name=early_come_duration_hour]").val();
            // var early_come_duration_minute  = $(".attendance_rule_staff_department select[name=early_come_duration_minute]").val();
            // var late_leave_duration_hour    = $(".attendance_rule_staff_department select[name=late_leave_duration_hour]").val();
            // var late_leave_duration_minute  = $(".attendance_rule_staff_department select[name=late_leave_duration_minute]").val();
            
            // var late_leave_duration_minute  = $(".attendance_rule_staff_department select[name=late_leave_duration_minute]").val();
            
            var days_l  = $("input[name='day[]']");
            var days = {};

            for (i=0; i < days_l.length; i++)
            {

                days[i] = {

                    weekend         : $("input[name='day[]']:eq("+i+")").prop( "checked" ),

                    count_as_early_come_from    : $("input[name='count_as_early_come_from[]']:eq("+i+")").val(),
                    normal_in_time_from         : $("input[name='normal_in_time_from[]']:eq("+i+")").val(),
                    on_duty_time                : $("input[name='on_duty_time[]']:eq("+i+")").val(),
                    normal_in_time_to           : $("input[name='normal_in_time_to[]']:eq("+i+")").val(),
                    late_count_untill           : $("input[name='late_count_untill[]']:eq("+i+")").val(),
                    count_as_early_leave_from        : $("input[name='count_as_early_leave_from[]']:eq("+i+")").val(),
                    normal_out_time_from        : $("input[name='normal_out_time_from[]']:eq("+i+")").val(),
                    off_duty_time               : $("input[name='off_duty_time[]']:eq("+i+")").val(),
                    normal_out_time_to          : $("input[name='normal_out_time_to[]']:eq("+i+")").val(),
                    late_leave_count_untill     : $("input[name='late_leave_count_untill[]']:eq("+i+")").val()
                }
            }

            var validate_from_day           = $(".attendance_rule_staff_department select[name=validate_from_day]").val();
            var validate_from_month         = $(".attendance_rule_staff_department select[name=validate_from_month]").val();
            var validate_from_year          = $(".attendance_rule_staff_department select[name=validate_from_year]").val();

            var validate_to_day             = $(".attendance_rule_staff_department select[name=validate_to_day]").val();
            var validate_to_month           = $(".attendance_rule_staff_department select[name=validate_to_month]").val();
            var validate_to_year            = $(".attendance_rule_staff_department select[name=validate_to_year]").val();

            var department                  = $(".attendance_rule_staff_department select[name=department]").val();
            var status                      = $(".attendance_rule_staff_department select[name=status]").val();
            
            console.log(days);

            var info = {

                _token                      : _token ,
                name                        : name ,

                // duty_on_time_hour           : duty_on_time_hour,
                // duty_on_time_minute         : duty_on_time_minute,
                // duty_on_time_am_pm          : duty_on_time_am_pm,

                // duty_off_time_hour          : duty_off_time_hour,
                // duty_off_time_minute        : duty_off_time_minute,
                // duty_off_time_am_pm         : duty_off_time_am_pm,

                // entry_time_from_hour        : entry_time_from_hour,
                // entry_time_from_minute      : entry_time_from_minute,
                // entry_time_from_am_pm       : entry_time_from_am_pm,
                // entry_time_to_hour          : entry_time_to_hour,
                // entry_time_to_minute        : entry_time_to_minute,
                // entry_time_to_am_pm         : entry_time_to_am_pm,

                // out_time_from_hour          : out_time_from_hour,
                // out_time_from_minute        : out_time_from_minute,
                // out_time_from_am_pm         : out_time_from_am_pm,
                // out_time_to_hour            : out_time_to_hour,
                // out_time_to_minute          : out_time_to_minute,
                // out_time_to_am_pm           : out_time_to_am_pm,

                // duty_on_time                : duty_on_time,
                // duty_off_time               : duty_off_time,
                // entry_time_from             : entry_time_from,
                // entry_time_to               : entry_time_to,
                // out_time_from               : out_time_from,
                // out_time_to                 : out_time_to,

                // late_duration_hour          : late_duration_hour,
                // late_duration_minute        : late_duration_minute,
                // early_leave_duration_hour   : early_leave_duration_hour,
                // early_leave_duration_minute : early_leave_duration_minute,

                // early_come_duration_hour    : early_come_duration_hour,
                // early_come_duration_minute  : early_come_duration_minute,
                // late_leave_duration_hour    : late_leave_duration_hour,
                // late_leave_duration_minute  : late_leave_duration_minute,

                days                        : days,

                validate_from_day           : validate_from_day ,
                validate_from_month         : validate_from_month ,
                validate_from_year          : validate_from_year ,

                validate_to_day             : validate_to_day ,
                validate_to_month           : validate_to_month ,
                validate_to_year            : validate_to_year ,

                department                  : department ,
                status                      : status 
            };

            request.method   = "POST"       	                               ;
            request.route    = 'admin/attendance/rule/staff/department/create' ;
            request.action   = ''          	                                   ;
            request.data     = info                                            ;
            request.sync     = false	                                     ;

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
