@extends('adminlte::page')

@section('title', 'Pengembalian')

@section('content_header')
    <h1 class="m-0 text-dark">Check Mahasiswa Pengembalian</h1>
@stop

@section('content')
<form action="{{route('validate')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">NIM</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="exampleInputName" placeholder="NIM" name="nim" value="{{old('nim')}}">
                            @error('nim') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Check</button>
                    </div>
                </div>
            </div>
        </div>
@stop
