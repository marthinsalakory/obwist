@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Objek Wisata</h1>
    <p class="mb-4">Dibawah ini adalah data objek wisata</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Objek Wisata</h6>
                <a href="{{route('objek_wisata.tambah')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">Gambar</th>
                            <th>Nama Tempat Wisata</th>
                            <th>Fasilitas</th>
                            <th>Alamat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($objek_wisata as $ow)
                        <tr>
                            <td class="text-center"><a href="{{url('storage/' . $ow->gambar)}}" target="_blank"><img width="60" src="{{url('storage/' . $ow->gambar)}}"></a></td>
                            <td>{{$ow->nama}}</td>
                            <td>
                                <ul>
                                    @php
                                        $fasilitasArray = explode(',', $ow->fasilitas);
                                    @endphp
                                    @foreach($fasilitasArray as $fasilitasItem)
                                        <li>{{ $fasilitasItem }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                {{$ow->alamat}}<hr>
                                <a href="https://www.google.com/maps/search/?api=1&query={{ $ow->latitude }},{{ $ow->longitude }}" target="_blank">Lihat di Google Maps</a>
                            </td>
                            <td>
                                <a href="{{route('objek_wisata.ubah', $ow->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <button onclick="$('#link_hapus').attr('href', '{{route('objek_wisata.hapus', $ow->id )}}')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#HapusModal"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>  
<!-- Hapus Modal-->
<div class="modal fade" id="HapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header bg-primary text-light">
            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Hapus?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Pilih Hapus untuk melanjutkan.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="link_hapus" class="btn btn-primary" href="">Hapus</a>
        </div>
    </div>
</div>
</div>
@endsection