@extends('layout.template')
@section('title','Students')
@section('content')

<div class="container mt-4">
    <form method="post" action="{{route('students.insert')}}">
        <div text-align="center">

            <h3>Inserir Estudante</h3>

        </div>
        @csrf
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="name">Nome Estudante</label></div>
            <div class="col-md-4"><input type="text" name="name" class="form-control" id="name"></div>
        </div>
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="email">Email</label></div>
            <div class="col-md-4"><input type="text" name="email" class="form-control" id="email"></div>
        </div>

        <div class="row mb-4">
            <div class="col-md-2 text-end"><label>Data Nascimento</label></div>
            <div class="col-md-4"><input type="date" name="birthday" class="form-control" id="birthday"></textarea></div>
        </div>
        <div class="row mb-4">
            <div class="col-md-2 text-end"></div>
            <div class="col-md-4 text-start"><button type="submit" class="btn btn-primary mb-4">Inserir</button></div>
        </div>

    </form>
</div>

@endsection