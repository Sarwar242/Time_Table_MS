@extends('layouts.master')
@section('contents')

<div align="center" style="margin-top:50px">
    <h1>GENERATE TIMETABLE</h1>
</div>

<form action="{{route('admin.generatetimetable.get')}}" method="post">
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
<form action="{{route('admin.generatetimetable.get')}}" method="post">
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
@endsection