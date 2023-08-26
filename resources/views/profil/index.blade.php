@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-12">            
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
                </div>
                <div class="card-body">
                    <div class="profile-info">
                        <p><span class="info-label">Nama:</span><span class="info-value">{{Auth::user()->name}}</span></p>
                        <p><span class="info-label">Email:</span><span class="info-value">{{Auth::user()->email}}</span></p>
                        <a href="{{route('profil.ubah')}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Ubah Data</a>
                        <a href="{{route('profil.ubah_password')}}" class="btn btn-warning btn-sm"><i class="fa fa-key"></i> Ubah Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection