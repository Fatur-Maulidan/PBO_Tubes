@extends('adminlte::page')

@section('title', 'Transaksi')

@section('content_header')
    <h1 class="m-0 text-dark">List Transaksi</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('getTransaksiPrint')}}" class="btn btn-primary mb-2">
                        Print Data
                    </a>

                    <table class="table table-hover table-striped yajra-datatables" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Peminjam</th>
                            <th>Nama Buku</th>
                            <th>Jumlah Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
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
                ajax: "{{ route('getTransaksi') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'namaPeminjam', name: 'namaPeminjam'},
                    {data: 'namaBuku', name: 'namaBuku'},
                    {data: 'jumlahBuku', name: 'jumlahBuku'},
                    {data: 'tanggalPeminjaman', name: 'tanggalPeminjaman'},
                    {data: 'tanggalPengembalian', name: 'tanggalPengembalian'},
                ]
            });
        });
    </script>
@endpush
