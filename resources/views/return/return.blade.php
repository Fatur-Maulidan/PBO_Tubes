@extends('adminlte::page')

@section('title', 'Mengembalikan')

@section('content_header')
    <h1 class="m-0 text-dark">Pengembalian</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped yajra-datatables" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Mahasiswa</th>
                            <th>Nama Buku</th>
                            <th>Jumlah Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksi as $key => $transaksi)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$transaksi->namaPeminjam}}</td>
                                <td>{{$transaksi->namaBuku}}</td>
                                <td>{{$transaksi->jumlahBuku}}</td>
                                <td>{{$transaksi->tanggalPeminjaman}}</td>
                                <td>
                                    <form action="{{route('setPengembalian', $transaksi->id)}}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Kembalikan</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
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
    </script>
@endpush
