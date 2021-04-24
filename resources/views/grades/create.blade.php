@extends('layout.template')
@section('title','Grades')
@section('content')
<div class="container mt-4">
    <form method="post" action="{{route('grades.insert')}}">
        <div text-align="center">

            <h3>Inserir Nota</h3>

        </div>
        @csrf
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
                <div class="col-md-4 text-start"><button type="submit" class="btn btn-primary mb-4">Inserir</button></div>
            </div>

    </form>
</div>

@endsection