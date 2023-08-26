@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Objek Wisata</h1>
    <p class="mb-4">Dibawah ini adalah data objek wisata</p>

    <form method="POST" class="card shadow mb-4">@csrf
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{Auth::user()->name}}">
                @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{Auth::user()->email}}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <a href="{{ route('profil') }}" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-trash-restore"></i> Reset</button>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
            </div>            
        </div>
    </form>
</div>  
@endsection