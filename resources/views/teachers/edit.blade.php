@extends('layout.template')
@section('title','Teachers')
@section('content')
<h1>Editar Professor</h1>
<form method="post" action="{{route('teachers.save', $teacher)}}">
    @csrf
    @method('put')
    <div class="row mb-4">
        <div class="col-md-2 text-end"><label for="name">Nome</label></div>
        <div class="col-md-4"><input type="text" name="name" class="form-control" id="name" require value="{{$teacher->name}}"></div>
    </div>
    <div class="row mb-4">
        <div class="col-md-2 text-end"><label>Email</label></div>
        <div class="col-md-4"><input type="email" name="email" class="form-control" id="email" value="{{$teacher->email}}"></div>
    </div>
    <div class="row mb-4">
        <div class="col-md-2 text-end"></div>
        <div class="col-md-4 text-start"><button type="submit" class="btn btn-primary mb-4">Enviar</button></div>
    </div>

</form>
@endsection