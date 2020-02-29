@extends('layouts.master')
@section('contents')

<div align="center" style="margin-top:50px">
    <button id="teachermanual" class="btn btn-success btn-lg">ADD ROUTINE</button>
</div>

<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content" style="margin-top: -110px">
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead">Add Routine</h2>
        </div>
        <div class="modal-body" id="EnterTeacher">
            <!--Admin Login Form-->
            <div style="display:none" id="addTeacherForm">
                <form action="{{route('admin.semester.routine.store')}}" method="POST">
                @csrf
                    <input type="hidden" name="semester_id" value="{{$semester->id}}">
        <div align="center">
        
        <select name="day_id" class="list-group-item">
            <option selected disabled>Select Day</option>
        @foreach(App\Models\Day::all()->where('type','open') as $day)
            <option value="{{$day->id}}">{{$day->name}}</option>
        @endforeach
        </select>
    </div>

    <div align="center" style="margin-top: 5px">
        <select name="period_id" class="list-group-item">
             <option selected disabled>Select Period</option>
             @foreach(App\Models\Period::all() as $period)
                <option value="{{$period->id}}">Peroid-{{$period->number}} --> {{$period->duration}}</option>
             @endforeach
        </select>
    </div>

    <div align="center" style="margin-top: 5px">
        <select name="subject_id" id ="subject_id" class="list-group-item">
             <option selected disabled>Select Subject</option>
             @foreach($subjects as $subject)
                <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
             @endforeach
        </select>
    </div>
    <div align="center" style="margin-top: 5px">
        <select name="teacher_id" class="list-group-item" id="teacher_id">
            <option  selected disabled>Select Subject First!</option>
        </select>
    </div>
    <div align="center" style="margin-top: 10px;">
        <button type="submit" class="btn btn-success btn-lg">Set</button>
    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var addteacherBtn = document.getElementById("teachermanual");
    var heading = document.getElementById("popupHead");
    var facultyForm = document.getElementById("addTeacherForm");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal

    addteacherBtn.onclick = function () {
        modal.style.display = "block";
        //heading.innerHTML = "Faculty Login";
        facultyForm.style.display = "block";
        //adminForm.style.display = "none";


    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        //adminForm.style.display = "none";
        facultyForm.style.display = "none";

    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>



<div align="center">
    <style>
        table {
            margin-top: 70px;
            margin-bottom: 50px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            margin-left: 80px;
            width: 90%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

    <table id=allotedclassroomstable>
        <caption><strong>Class Routines for {{$semester->name}}</strong></caption>
        <tr>
            <td style="text-align:center">WEEKDAYS</td>
        @foreach(App\Models\Period::orderBy('number','asc')->get() as $period)
            <td style="text-align:center">{{$period->duration}}</td>
        @endforeach
        </tr>
        <tbody> 
        @foreach(App\Models\Day::all()->where('type','open') as $day)
            <tr>
            <td style="text-align:center">{{$day->name}}</td>
            @php $inc=0; @endphp
            @foreach(App\Models\Period::all() as $period)
            @php $inc+=1;
            $check=0; @endphp
            
            @foreach($day->routines()->where('semester_id',$semester->id)->where('period_id',$period->id)->orderBy('period_id','asc')->get() as $routine)

            <td style="text-align:center">{{$routine->subject->subject_name}} 
            <span><br></span>{{$routine->teacher->name}}   <span><br></span>    
            <a href="{{route('admin.delete_routine',$routine->id)}}" data-confirm="Are you sure to delete this routine?"
                                            class="delete"><i style="font-size:20px;" class="fas fa-minus-circle"></i></a></td> 
            </td>
          
            @php $check=1; @endphp
            @endforeach 
          
          @if($check!=1) <td style="text-align:center; font-size:25px;">--</td>  @endif
            @endforeach

           
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


<!-- Get Teacher Based on subject -->
<script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
<script>
$("#subject_id").change(function() {
    var sub = $("#subject_id").val();
    $("#teacher_id").html("");
    var option = " ";
    //send an ajax req to servers
    $.get("http://127.0.0.1:8000/admin/get-teachers/" +
    sub,
        function(data) {
            console.log(data);
            var d = JSON.parse(data);
            d.forEach(function(element) {
                console.log(element.id);
                option += "<option value='" + element.id + "'>" + element.name + "</option>";
            });

            $("#teacher_id").html(option);
        });

});
</script>
<script>
    var deleteLinks = document.querySelectorAll('.delete');

    for (var i = 0; i < deleteLinks.length; i++) {
  deleteLinks[i].addEventListener('click', function(event) {
      event.preventDefault();

      var choice = confirm(this.getAttribute('data-confirm'));

      if (choice) {
        window.location.href = this.getAttribute('href');
      }
  });
}
</script>
@endsection