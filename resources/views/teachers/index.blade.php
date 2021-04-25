@extends('layout.template')
@section('title','Teachers')
@section('content')
<?php
/*       @session_start();
        if (@$_SESSION['id'] == null) {
            echo "<script>window.location='./'</script>";
        } */
if (!isset($id)) {
    $id = "";
}
?>

<a href="{{route('teachers.create')}}" type="button" class="btn btn-primary mt-4 mb-4">Inserir Professor</a>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">Nome Professor</th>
                        <th class="text-center">Email</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                    <tr>
                        <td class="text-center">{{$teacher->name}}</td>
                        <td class="text-center">{{$teacher->email}}</td>
                        <td class="text-center"><a href="{{route('teachers.edit', $teacher)}}"><i class="fas fa-edit text-info me-2"></i></a>
                            <a href="{{route('teachers.remove', $teacher)}}"><i class="fas fa-trash text-danger me-2"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- {{$teachers->links()}} -->
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
<!-- modal -->
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
                <a href="{{route('teachers.index')}}" class="btn btn-secondary">Cancelar</a>
                <form method="post" action="{{route('teachers.delete', $id)}}">
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