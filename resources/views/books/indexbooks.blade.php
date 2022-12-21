@extends('adminlte::page')

@section('title', 'List Buku')

@section('content_header')
    <h1 class="m-0 text-dark">List Buku</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('books.create')}}" class="btn btn-primary mb-2">
                        Tambah Buku
                    </a>

                    <table class="table table-hover table-bordered table-stripped yajra-datatables" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Buku</th>
                            <th>Author</th>
                            <th>Genre Buku</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>


    <script>
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            // sweet alert
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                console.log(result);
                if (result.dismiss != 'cancel' && result) {
                    $('#delete-form').attr('action', $(el).attr('href'));
                    $('#delete-form').submit();
                }
            })
        }

        $(function () {
            var table = $('#example2').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('books.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'namaBuku', name: 'namaBuku'},
                    {data: 'author', name: 'author'},
                    {data: 'genreBuku', name: 'genreBuku'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endpush
