@extends('adminlte::page')

@section('title', 'Update Buku')

@section('content_header')
    <h1 class="m-0 text-dark">Update Buku</h1>
@stop

@section('content')
    <form action="{{route('books.update', $buku)}}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputName">Nama Buku</label>
                            <input type="text" class="form-control" id="exampleInputNamaBuku" placeholder="Nama Buku" name="namaBuku" value="{{$buku->namaBuku}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail">Author</label>
                            <input type="text" class="form-control" id="exampleInputAuthor" placeholder="Nama Author" name="author" value="{{$buku->author}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">Genre Buku</label>
                            <input type="text" class="form-control" id="exampleInputGenreBuku" placeholder="Genre Buku" name="genreBuku" value="{{$buku->genreBuku}}">
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
