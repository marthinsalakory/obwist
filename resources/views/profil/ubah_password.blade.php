@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Objek Wisata</h1>
    <p class="mb-4">Dibawah ini adalah data objek wisata</p>

    <form method="POST" class="card shadow mb-4">@csrf
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="password_lama">Password Lama</label>
                <input type="text" name="password_lama" id="password_lama" class="form-control @error('password_lama') is-invalid @enderror">
                @error('password_lama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="password">Password Baru</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="password_confirmation">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <a href="{{route('profil')}}" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-trash-restore"></i> Reset</button>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>\
            </div>
        </div>
    </form>
</div>
@endsection