<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>TimeTable Management System</title>
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
                <li><a href="{{route('admin.addTeacher')}}">ADD TEACHERS</a></li>
                <li><a href="{{route('admin.subjects')}}">ADD SUBJECTS</a></li>
                <li><a href="{{route('admin.classrooms')}}">ADD CLASSROOMS</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">ALLOTMENT
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href=allotsubjects.php>THEORY COURSES</a>
                        </li>
                        <li>
                            <a href=allotpracticals.php>PRACTICAL COURSES</a>
                        </li>
                        <li>
                            <a href=allotclasses.php>CLASSROOMS</a>
                        </li>
                    </ul>
                </li>
                <li><a href="generatetimetable.php">GENERATE TIMETABLE</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a></li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>
<!--NAVBAR SECTION END-->
<br>


@yield('contents')

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