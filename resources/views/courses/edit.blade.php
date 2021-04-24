@extends('layout.template')
@section('title','Courses')
@section('content')
<h1>Editar Curso</h1>
<form method="post" action="{{route('courses.save', $course)}}">
    @csrf
    @method('put')
    <div class="row mb-4">
        <div class="col-md-2 text-end"><label for="name">Nome</label></div>
        <div class="col-md-4"><input type="text" name="name" class="form-control" id="name" require value="{{$course->name}}"></div>
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label>Descrição</label></div>
            <div class="col-md-4"><input type="description" name="description" class="form-control" id="description" value="{{$course->description}}"></div>
        </div>
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label>Créditos</label></div>
            <div class="col-md-4"><input type="credits" name="credits" class="form-control" id="credits" value="{{$course->credits}}"></div>
        </div>
        <div class="row mb-4">
            <div class="col-md-2 text-end"></div>
            <div class="col-md-4 text-start"><button type="submit" class="btn btn-primary mb-4">Enviar</button></div>
        </div>

</form>
@endsection