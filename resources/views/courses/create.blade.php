@extends('layout.template')
@section('title','Create Courses')
@section('content')

<div class="container mt-4">
    <form method="post" action="{{route('courses.insert')}}">
        <div text-align="center">

            <h3>Inserir Curso</h3>

        </div>
        @csrf
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="name">Nome Curso</label></div>
            <div class="col-md-4"><input type="text" name="name" class="form-control" id="name"></div>
        </div>
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="description">Descrição Curso</label></div>
            <div class="col-md-4"><textarea name="description" rows="3" class="form-control" id="description"></textarea></div>
        </div>

        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="credits">Creditos</label></div>
            <div class="col-md-4"><input type="number" name="credits" class="form-control" id="credits"></textarea></div>
        </div>
        <div class="row mb-4">
            <div class="col-md-2 text-end"></div>
            <div class="col-md-4 text-start"><button type="submit" class="btn btn-primary mb-4">Inserir</button></div>
        </div>

    </form>
</div>

@endsection