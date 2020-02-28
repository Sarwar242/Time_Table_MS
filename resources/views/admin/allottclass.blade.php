@extends('layouts.master')
@section('contents')

<form action="{{route('admin.allotClassroom.store')}}" method="post" style="margin-top: 100px">
@csrf
    <div align="center">
        <select name="semester_id" class="list-group-item">
            <option selected disabled>Select Semester</option>
        @foreach(App\Models\Semester::all() as $sem)
            <option value="{{$sem->id}}">{{$sem->name}}</option>
        @endforeach
        </select>
    </div>

    <div align="center" style="margin-top: 5px">
        <select name="classroom_id" class="list-group-item">
             <option selected disabled>Select Classroom</option>
             @foreach($classrooms as $classroom)
                <option value="{{$classroom->id}}">{{$classroom->name}}</option>
             @endforeach
        </select>
    </div>
    <div align="center" style="margin-top: 10px;">
        <button type="submit" class="btn btn-success btn-lg">Allot</button>
    </div>
</form>

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
        <caption><strong>CLASSROOMS ALLOTMENT</strong></caption>
        <tr>
            <th width="250">Classroom</th>
            <th width="400">Alloted To</th>
            <th width="60">Action</th>
        </tr>
        <tbody>
        @foreach(App\Models\Classroom::all()->where("status",1) as $classroom)
        <tr>
        <td>{{$classroom->name}}</td>
            <td>{{$classroom->semester->name}}</td>
            <td><a href="{{route('admin.delete_classroom_allotment',$classroom->id)}}" data-confirm="Are you sure to delete this?"
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