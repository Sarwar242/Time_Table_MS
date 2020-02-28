@extends('layouts.master')
@section('contents')
<div align="center">
    <form action="{{route('admin.allotLab.store')}}" method="post" style="margin-top: 100px">
    @csrf
        <div style="margin-top: 5px">
            <select name="subject_id" class="list-group-item">
                
         <option selected disabled>Select Subject</option>
         @foreach(App\Models\Subject::all()->where("course_type", "=", "LAB") as $subject)
         <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
         @endforeach
            </select>
        </div>
        <div>
            <select name="teacher_id" class="list-group-item">
                 <option selected disabled>Select Teacher</option>
                 @foreach(App\Models\Teacher::all() as $teacher)
            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
         @endforeach
            </select>
        </div>
        <div style="margin-top: 10px">
            <button type="submit" class="btn btn-success btn-lg">Allot</button>
        </div>
    </form>
</div>

<style>
    table {
        margin-top: 80px;
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

<table id=allotedsubjectstable>
    <caption><strong>LAB COURSES ALLOTMENT</strong></caption>
    <tr>
        <th width="150">Subject Code</th>
        <th width=420>Subject Title</th>
        <th width="170">Faculty No</th>
        <th width="330">Teacher's Name</th>
        <th width="40">Action</th>
    </tr>
    <tbody>
    
    @foreach($subs as $sub)
@if(!is_null($sub->teachers()->first()))

@foreach($sub->teachers as $teacher)
    <tr>
        <td>{{$sub->subject_name}}</td>
        <td>{{$sub->subject_code}}</td>
        <td>{{$teacher->faculty_number}}</td>
        <td>{{$teacher->name}}</td>
        <td><a href="{{route('admin.delete_allotment_lab',$sub->id)}}" data-confirm="Are you sure to delete this item?"
                                            class="delete btn btn-danger btn-mini">Delete</a></td>
    </tr>
    @endforeach
    @endif
    @endforeach

    </tbody>
</table>


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