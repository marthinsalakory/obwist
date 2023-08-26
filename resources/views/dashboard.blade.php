@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Unduh Aplikasi Android</a>
</div>


<!-- Content Row -->
<div class="row">

    <div class="col-12 mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">OBJEK WISATA</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;"
                        src="{{url('/admin')}}/img/undraw_posting_photo.svg" alt="...">
                </div>
                <p>Aplikasi Objek Wisata adalah platform yang memungkinkan pengguna untuk menjelajahi dan mengelola informasi mengenai berbagai objek wisata. Dengan antarmuka yang intuitif, aplikasi ini memungkinkan pengguna untuk menambahkan, mengedit, dan melihat detail objek wisata beserta lokasinya pada peta interaktif.</p>

                <h2>Fitur Utama:</h2>
                <ul>
                    <li>Pendaftaran dan Autentikasi Pengguna</li>
                    <li>Penambahan Objek Wisata</li>
                    <li>Pengelolaan Objek Wisata</li>
                    <li>Peta Interaktif</li>
                    <li>Visualisasi Fasilitas</li>
                    <li>Gambar Preview</li>
                    <li>Pengeditan Lokasi</li>
                    <li>Navigasi Google Maps</li>
                </ul>

                <h2>Keuntungan:</h2>
                <ul>
                    <li>Pembaruan Informasi</li>
                    <li>Visualisasi Lokasi</li>
                    <li>Pengalaman Pengguna yang Sederhana</li>
                    <li>Promosi Objek Wisata</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection