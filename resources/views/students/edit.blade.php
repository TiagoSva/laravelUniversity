@extends('layout.template')
@section('title','Students')
@section('content')
<h1>Editar Alunos</h1>
<form method="post" action="{{route('students.save', $student)}}">
    @csrf
    @method('put')
    <div class="row mb-4">
        <div class="col-md-2 text-end"><label for="name">Nome</label></div>
        <div class="col-md-4"><input type="text" name="name" class="form-control" id="name" require value="{{$student->name}}"></div>
    </div>
    <div class="row mb-4">
        <div class="col-md-2 text-end"><label>Email</label></div>
        <div class="col-md-4"><input type="email" name="email" class="form-control" id="email" value="{{$student->email}}"></div>
    </div>
    <div class="row mb-4">
        <div class="col-md-2 text-end"><label>Ano Nascimento</label></div>
        <div class="col-md-4"><input type="date" name="birthday" class="form-control" id="birthday" value="{{date('Y-m-d',strtotime($student->birthday))}}"></div>
    </div>
    <div class="row mb-4">
        <div class="col-md-2 text-end"></div>
        <div class="col-md-4 text-start"><button type="submit" class="btn btn-primary mb-4">Enviar</button></div>
    </div>

</form>

@endsection