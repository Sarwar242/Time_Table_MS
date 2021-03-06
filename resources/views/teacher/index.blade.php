<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>TimeTable Management System</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/html2canvas.js') }}"></script>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet"/>
    <!-- FONT AWESOME CSS -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet"/>
    <!-- FLEXSLIDER CSS -->
    <link href="{{asset('css/flexslider.css')}}" rel="stylesheet"/>
    <!-- CUSTOM STYLE CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet"/>
    <!-- Google	Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'/>
    <!-- Google	Fonts -->
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top " id="menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="navbar-collapse collapse move-me">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#">Hello {{session('teacherName')}}</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('teacher.logout') }}">LOGOUT</a></li>
            </ul>

            <form id="logout-form" action="{{ route('teacher.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </div>
    </div>
</div>
<!--NAVBAR SECTION END-->
<br>
<!--Algorithm Implementation-->


<div align="center" style="margin-top:50px">
    <h1>GENERATE TIMETABLE</h1>
</div>

<form action="{{route('teacher.get_timetable')}}" method="post">
@csrf
    <div align="center" style="margin-top: 30px">
            <select name="teacher_id" class="list-group-item">
                <option selected disabled>Select Teacher</option>
            @foreach(App\Models\Teacher::all() as $teach)
                <option value="{{$teach->id}}">{{$teach->name}}</option>
            @endforeach
            </select>
            <input type="hidden" name="checker" value="teacher">
        <button type="submit" id="viewteacher" class="btn btn-success btn-lg" style="margin-top: 5px">VIEW TIMETABLE
        </button>
    </div>
</form>
<form action="{{route('teacher.get_timetable')}}" method="post">
@csrf
    <div align="center" style="margin-top: 20px">
        <select name="semester_id" class="list-group-item">
            <option selected disabled>Select Semester</option>
            @foreach(App\Models\Semester::all() as $sem)
            <option value="{{$sem->id}}">{{$sem->name}}</option>
            @endforeach
        </select>
        <input type="hidden" name="checker" value="semester">
        <button type="submit" id="viewsemester" class="btn btn-success btn-lg" style="margin-top: 5px">VIEW TIMETABLE
        </button>
    </div>
</form>


<div>
    <br>
    <style>
        table {
            margin-top: 20px;
            margin-bottom: 25px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 2px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #ffffff;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }
    </style>
    <div id="TT" style="background-color: #FFFFFF">
        <table border="2" cellspacing="3" align="center" id="timetable">
        <caption style="font-size:40px; margin:10px;"><strong>
        @if($method=="semester")
        Class Routines for {{$semester->name}} 
        @elseif($method=="teacher")
        {{$teacher->name}}
        @endif</strong></caption>
        <tr>
            <td style="text-align:center">WEEKDAYS</td>
        @foreach(App\Models\Period::orderBy('number','asc')->get() as $period)
            <td style="text-align:center">{{$period->duration}}</td>
        @endforeach
        </tr>
        @if($method=="semester")
        <tbody> 
        @foreach(App\Models\Day::all()->where('type','open') as $day)
            <tr>
            <td style="text-align:center">{{$day->name}}</td>
            @php $inc=0; @endphp
            @foreach(App\Models\Period::all() as $period)
            @php $inc+=1;
            $check=0; @endphp
            
            @foreach($day->routines()->where('semester_id',$semester->id)
            ->where('period_id',$period->id)->orderBy('period_id','asc')->get() as $routine)

            <td style="text-align:center">{{$routine->subject->subject_name}} 
            <span><br></span>{{$routine->teacher->name}}</td> 
            </td>
          
            @php $check=1; @endphp
            @endforeach 
          
          @if($check!=1) <td style="text-align:center; font-size:25px;">--</td>  @endif
            @endforeach
            </tr>
        @endforeach
        </tbody>
        @elseif($method=="teacher")

        <tbody> 
        @foreach(App\Models\Day::all()->where('type','open') as $day)
            <tr>
            <td style="text-align:center">{{$day->name}}</td>
            @php $inc=0; @endphp
            @foreach(App\Models\Period::all() as $period)
            @php $inc+=1;
            $check=0; @endphp
            
            @foreach($day->routines()->where('teacher_id',$teacher->id)->where('period_id',$period->id)->orderBy('period_id','asc')->get() as $routine)
            <td style="text-align:center">{{$routine->subject->subject_code}} 
            <span><br></span>{{$routine->semester->name}}<span><br></span> 
            @foreach(App\Models\Semester::where('id',$routine->semester->id)->where('classroom_id','!=',null)->get() as $class)
            {{$class->classroom->name}}
            @endforeach</td> 
            </td>
          
            @php $check=1; @endphp
            @endforeach 
          
          @if($check!=1) <td style="text-align:center; font-size:25px;">--</td>  @endif
            @endforeach

           
            </tr>
        @endforeach
        </tbody>
        @endif
        </table>
    </div>
</div>
@if($method=="semester")
<div align="center" style="margin-top: 10px">
<h1>ClassRoom: @if(!is_null($semester->classroom)){{$semester->classroom->name}} @endif</h1>
GENERATED VIA TIMETABLE MANAGEMENT SYSTEM, COMPUTER SCIENCE AND ENGINEERING DEPARTMENT, BU.    
</div>
@elseif($method=="teacher")
<div align="center" style="margin-top: 10px">
GENERATED VIA TIMETABLE MANAGEMENT SYSTEM, COMPUTER SCIENCE AND ENGINEERING DEPARTMENT, BU.    
</div>
@endif


<!--HOME SECTION END-->

<!--<div id="footer">
    <!--  &copy 2014 yourdomain.com | All Rights Reserved |  <a href="http://binarytheme.com" style="color: #fff" target="_blank">Design by : binarytheme.com</a>
-->
<!-- FOOTER SECTION END-->

<!--  Jquery Core Script -->
<script src="{{ asset('js/jquery-1.10.2.js') }} "></script>
<!--  Core Bootstrap Script -->
<script src="{{ asset('js/bootstrap.js') }}"></script>
<!--  Flexslider Scripts -->
<script src="{{asset('js/jquery.flexslider.js')}}"></script>
<!--  Scrolling Reveal Script -->
<script src="{{asset('js/scrollReveal.js')}}"></script>
<!--  Scroll Scripts -->
<script src="{{asset('js/jquery.easing.min.js')}}"></script>
<!--  Custom Scripts -->
<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>
