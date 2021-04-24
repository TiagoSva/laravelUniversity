@extends('layout.template')
@section('title','Courses')
@section('content')
<?php
/*@session_start();
if (@$_SESSION['id'] == null) {
    echo "<script>window.location='./'</script>";
}*/
if (!isset($id)) {
    $id = "";
}
?>

<a href="{{route('courses.create')}}" type="button" class="btn btn-primary mt-4 mb-4">Inserir Cursos</a>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição Curso</th>
                        <th>Creditos</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>
                        <td>{{$course->name}}</td>
                        <td>{{$course->description}}</td>
                        <td>{{$course->credits}}</td>
                        <td><a href="{{route('courses.edit', $course)}}"><i class="fas fa-edit text-info me-2"></i></a>
                            <a href="{{route('courses.remove', $course)}}"><i class="fas fa-trash text-danger me-2"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- {{$courses->links()}} -->
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    })
</script>
@endsection
@section('footer')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apagar Registo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Deseja realmente apagar o registo?
                {{$id}}
            </div>
            <div class="modal-footer">

                <a href="{{route('courses.index')}}" class="btn btn-secondary">Cancelar</a>
                <form method="post" action="{{route('courses.delete', $id)}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Apagar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if ($id != "") {
    echo "<script>
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
    myModal.show();
    </script>";
}
?>

@endsection