@extends('layout.template')
@section('title','Grades')
@section('content')

<!-- <?php
        @session_start();
        if (@$_SESSION['id'] == null) {
            echo "<script>window.location='./'</script>";
        }
        if (!isset($id)) {
            $id = "";
        }
        ?> -->

<a href="{{route('grades.create')}}" type="button" class="btn btn-primary mt-4 mb-4">Inserir Nota</a>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%">
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>Aluno</th>
                        <th>Professor</th>
                        <th>Nota</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grades as $grade)
                    <tr>
                        <td>{{$grade->course_name}}</td>
                        <td>{{$grade->student_name}}</td>
                        <td>{{$grade->teacher_name}}</td>
                        <td>{{$grade->grade}}</td>
                        <td><a href="{{route('grades.edit', $grade->id_course.-$grade->id_student.-$grade->id_teacher)}}"><i class="fas fa-edit text-info me-2"></i></a>
                            <a href="{{route('grades.remove', $grade->grade)}}"><i class="fas fa-trash text-danger me-2"></i></a>
                        </td>
                    </tr>


                    @endforeach
                </tbody>
            </table>
            <!-- {{$grades->links()}} -->
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
                <h5 class="modal-title" id="exampleModalLabel">Remover Registo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Deseja realmente remover o registo?
                {{$id}}
            </div>
            <div class="modal-footer">

                <a href="{{route('grades.index')}}" class="btn btn-secondary">Cancelar</a>
                <form method="post" action="{{route('grades.delete', $id)}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Remover</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <?php
        if ($id != "") {
            echo "<script>
    var myModal = new bootstrap.Modal ( document.getElementById('exampleModal'));
    myModal.show();
    </script>";
        }
        ?> -->

@endsection