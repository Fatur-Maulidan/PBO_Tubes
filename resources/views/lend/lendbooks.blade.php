@extends('adminlte::page')

@section('title', 'Meminjam')

@section('content_header')
    <h1 class="m-0 text-dark">Meminjam</h1>
@stop

@section('content')
<form action="{{route('setLend', $mahasiswa->id)}}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">ID Buku</label>
                            <input type="text" class="form-control @error('idBuku') is-invalid @enderror" id="exampleInputName" placeholder="idbuku" name="idBuku" value="{{old('idBuku')}}">
                            @error('idBuku') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Jumlah Peminjaman</label>
                            <input type="text" class="form-control @error('pinjam') is-invalid @enderror" id="exampleInputName" placeholder="pinjam" name="pinjam" value="{{old('pinjam')}}">
                            @error('pinjam') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        {{-- <a href="{{route('lendBooks',$mahasiswa)}}" class="btn btn-primary">
                            Pinjam
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
@stop