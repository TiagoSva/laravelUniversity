@extends('layout.template')
@section('title','Grades')
@section('content')
<h1>Grades edit</h1>
<form method="post" action="{{route('grades.save', $grade->grade)}}">
    @csrf
    @method('put')
    <div class="row mb-4">
        <div><label for="grade">Nota</label></div>
        <div><input type="text" name="grade" class="form-control" id="grade"></div>

        <div><label>Aluno</label></div>
        <select class="form-select" aria-label="Default select example" name="student_id">
            <option selected>Selecione Aluno</option>
            @foreach ($students as $student)

            <option value="{{$student->id}}">{{$student->name}}</option>

            @endforeach
        </select>


        <div><label>Professor</label></div>
        <select class="form-select" aria-label="Default select example" name="teacher_id">
            <option selected>Selecione Professor</option>
            @foreach ($teachers as $teacher)

            <option value="{{$teacher->id}}">{{$teacher->name}}</option>

            @endforeach
        </select>


        <div><label>Curso</label></div>
        <select class="form-select" aria-label="Default select example" name="course_id">
            <option selected>Selecione Curso</option>
            @foreach ($courses as $course)

            <option value="{{$course->id}}">{{$course->name}}</option>

            @endforeach
        </select>

        <div class="row mb-4">
            <div class="col-md-2 text-end"></div>
            <div class="col-md-4 text-start"><button type="submit" class="btn btn-primary mb-4">Enviar</button></div>
        </div>

</form>
@endsection