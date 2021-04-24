@extends('layout.template')
@section('title','Teachers')
@section('content')

<div class="container mt-4">
    <form method="post" action="{{route('teachers.insert')}}">
        <div text-align="center">

            <h3>Inserir Professor</h3>

        </div>
        @csrf
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="name">Nome Professor</label></div>
            <div class="col-md-4"><input type="text" name="name" class="form-control" id="name"></div>
        </div>
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="email">Email</label></div>
            <div class="col-md-4"><input type="text" name="email" class="form-control" id="email"></div>
        </div>
        <div class="row mb-4">
            <div class="col-md-2 text-end"></div>
            <div class="col-md-4 text-start"><button type="submit" class="btn btn-primary mb-4">Inserir</button></div>
        </div>

    </form>
</div>
@endsection