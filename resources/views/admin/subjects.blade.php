@extends('layouts.master')
@section('contents')
<div align="center" style="margin-top:60px">
    <!-- <form name="import" method="post" enctype="multipart/form-data">
        <input type="file" name="file"/>
        <input type="submit" name="subjectexcel" id="subjectexcel" class="btn btn-info btn-lg" value="IMPORT EXCEL"/>
    </form> -->
</div>
<div align="center" style="margin-top: 5px">

    <button id="subjectmanual" class="btn btn-success btn-lg">ADD SUBJECT</button>
</div>

<div id="myModal" style="" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead">Add Subject</h2>
        </div>
        <div class="modal-body" id="EnterSubject">
            <!--Admin Login Form-->
            <div style="display:none" id="addSubjectForm">
                <form action="{{ route('admin.addSubject') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="subjectname">Subject Name</label>
                        <input type="text" class="form-control" id="subjectname" name="subject_name"
                               placeholder="Subject's Name ...">
                    </div>
                    <div class="form-group">
                        <label for="subjectcode">Subject Code</label>
                        <input type="text" class="form-control" id="subjectcode" name="subject_code" placeholder="CSE2203 CSE2205...">
                    </div>
                    <div class="form-group">
                        <label for="subjecttype">Course Type</label>
                        <select class="form-control" id="subjecttype" name="course_type">
                            <option selected disabled>Select</option>
                            <option value="THEORY">THEORY</option>
                            <option value="LAB">LAB</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subjectsemester">Semester</label>
                        <select class="form-control" id="subjectsemester" name="semester_id">
                            <option selected disabled>Select</option>

                            @foreach(App\Models\Semester::all() as $semester)
                            <option value="{{$semester->id}}">{{$semester->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subjectdepartment">Department</label>
                        <select class="form-control" id="subjectdepartment" name="department_id">
                            <option selected disabled>Select</option>
                            @foreach(App\Models\Department::all() as $department)
                            <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div align="right" class="form-group">
                        <input type="submit" class="btn btn-default"  value="ADD">
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
    var addsubjectBtn = document.getElementById("subjectmanual");
    var heading = document.getElementById("popupHead");
    var subjectForm = document.getElementById("addSubjectForm");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal

    addsubjectBtn.onclick = function () {
        modal.style.display = "block";
        //heading.innerHTML = "Faculty Login";
        subjectForm.style.display = "block";
        //adminForm.style.display = "none";


    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        //adminForm.style.display = "none";
        subjectForm.style.display = "none";

    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


<div>
    <br>
    <style>
        table {
            margin-top: 10px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            margin-left: 50px;
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

   
    <table id=subjectstable style="margin-left: 90px">
        <caption><strong> Subject's Information</strong></caption>
        <tr>
            <th width="150">Code</th>
            <th width=300>Title</th>
            <th width=150>Course Type</th>
            <th width="150">Semester</th>
            <th width="350">Department</th>
            <th width="40">Action</th>
        </tr>
        <tbody>
        @foreach(App\Models\Subject::all() as $subject)
        <tr>
            <td>{{$subject->subject_code}}</td>
            <td>{{$subject->subject_name}}</td>
            <td>{{$subject->course_type}}</td>
            <td>{{$subject->semester->name}}</td>
            <td>{{$subject->department->name}}</td>
            <td>
               <a href="{{route('admin.deleteSubject',$subject->id)}}" data-confirm="Are you sure to delete this item?"
                                            class="delete btn btn-danger btn-mini">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>


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