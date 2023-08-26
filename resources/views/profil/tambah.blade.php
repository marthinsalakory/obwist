@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Objek Wisata</h1>
    <p class="mb-4">Dibawah ini adalah data objek wisata</p>

    <form method="POST" class="card shadow mb-4" enctype="multipart/form-data">@csrf
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Formulir Penambahan Objek Wisata</h6>
                <div>
                    <a href="{{route('objek_wisata')}}" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                    <button class="btn btn-primary btn-sm"><i class="fa fa-send"></i> Kirim</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="nama">Nama Objek Wisata</label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}">
                @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{old('alamat')}}">
                @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="fasilitas">Fasilitas</label>
                <input type="text" name="fasilitas" id="fasilitas" class="form-control @error('fasilitas') is-invalid @enderror" value="{{old('fasilitas')}}">
                @error('fasilitas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-md-6 col-12 form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control-file @error('gambar') is-invalid @enderror" value="{{ old('gambar') }}">
                    @error('gambar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 col-12 form-group text-center">
                    <img id="gambar-preview" src="#" alt="Preview" style="max-width: 200px; display: none;">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" name="latitude" id="latitude" class="form-control @error('latitude') is-invalid @enderror" value="{{old('latitude')}}">
                    @error('latitude')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-6 form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" name="longitude" id="longitude" class="form-control @error('longitude') is-invalid @enderror" value="{{old('longitude')}}">
                    @error('longitude')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div id="map" style="width: 100%; height: 300px;"></div>
            </div>
        </div>
    </form>

</div>  

{{-- Leaflet --}}
<link rel="stylesheet" href="{{url('/admin')}}/vendor/leaflet/leaflet.css" /> 
<script src="{{url('/admin')}}/vendor/leaflet/leaflet.js"></script>
<script>
    // Inisialisasi peta pada elemen dengan ID "map"
    var map = L.map('map').setView([-3.6951, 128.1818], 11); // Ganti koordinat dan zoom sesuai kebutuhan
    
    // Menambahkan layer peta (misalnya, peta OpenStreetMap)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    var latitudeInput = document.getElementById('latitude');
    var longitudeInput = document.getElementById('longitude');
    var marker;

    map.on('click', function (event) {
        if (marker) {
            map.removeLayer(marker); // Hapus marker sebelum menambahkan yang baru
        }
        
        var latlng = event.latlng;
        latitudeInput.value = latlng.lat.toFixed(6);
        longitudeInput.value = latlng.lng.toFixed(6);
        
        marker = L.marker(latlng).addTo(map);
    });
</script>
@endsection