@extends('layout.template')
@section('title','Grades')
@section('content')
<h1>Editar Notas</h1>
<form method="post" action="{{route('grades.save',$grade->id_course.-$grade->id_student.-$grade->id_teacher)}}">
    @csrf
    @method('put')
    <div class="row mb-4">

        <div class="fw-bold mt-2 mb-1"><label  for="grade">Status</label></div>

        <div class="form-check form-switch mb-4 ms-3">
            <input style="height: 1.5em; width: 3em;" class="form-check-input me-2" type="checkbox" id="flexSwitchCheckDefault" name="status" <?php echo $grade->status === 1  ? 'checked' : '' ?>>
            <label class="form-check-label" for="flexSwitchCheckDefault">Marque para deixar a Grade com o status ativo</label>
          </div>

        <div><label for="grade">Nota</label></div>
        <div><input type="text" name="grade" class="form-control" id="grade" value={{$grade->grade}}></div>

        <div><label>Aluno</label></div>
        <select class="form-select" aria-label="Default select example" name="student_id" disabled>

            @foreach ($students as $student)

            <option value="{{$student->id}}" <?php echo $student->id === $grade->id_student ? 'selected' : '' ?>>{{$student->name}}</option>

            @endforeach
        </select>


        <div><label>Professor</label></div>
        <select class="form-select" aria-label="Default select example" name="teacher_id" disabled>

            @foreach ($teachers as $teacher)

            <option value="{{$teacher->id}}" <?php echo $teacher->id === $grade->id_teacher ? 'selected' : '' ?>>{{$teacher->name}}</option>

            @endforeach
        </select>


        <div><label>Curso</label></div>
        <select class="form-select" aria-label="Default select example" name="course_id" disabled>

            @foreach ($courses as $course)

            <option value="{{$course->id}}" <?php echo $course->id === $grade->id_course ? 'selected' : '' ?>>{{$course->name}}</option>

            @endforeach
        </select>

        <div class="row mb-4">
            <div class="col-md-2 text-end"></div>
            <div class="col-md-4 text-start"><button type="submit" class="btn btn-primary mb-4">Enviar</button></div>
        </div>

</form>
@endsection