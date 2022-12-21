@extends('adminlte::page')

@section('title', 'Tambah Buku')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Buku</h1>
@stop

@section('content')
    <form action="{{route('books.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputName">Nama Buku</label>
                            <input type="text" class="form-control @error('namaBuku') is-invalid @enderror" id="exampleInputNamaBuku" placeholder="Nama Buku" name="namaBuku">
                            @error('namaBuku') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail">Author</label>
                            <input type="text" class="form-control" id="exampleInputAuthor" placeholder="Nama Author" name="author">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">Genre Buku</label>
                            <input type="text" class="form-control" id="exampleInputGenreBuku" placeholder="Genre Buku" name="genreBuku">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">Jumlah Buku</label>
                            <input type="text" class="form-control" id="exampleInputJumlahBuku" placeholder="Jumlah Buku" name="jumlahBuku">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('books.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
@stop
