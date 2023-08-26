<?php

namespace App\Http\Controllers;

use App\Models\ObjekWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObjekWisataController extends Controller
{
    public function index()
    {
        return view('objek_wisata.index', [
            'objek_wisata' => ObjekWisata::all(),
        ]);
    }

    public function tambah()
    {
        return view('objek_wisata.tambah');
    }

    public function kirim(ObjekWisata $objekWisata, Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'fasilitas' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Simpan gambar
        $gambarPath = $request->file('gambar')->store('gambar_wisata', 'public');

        // Mengisi properti model dengan data dari request
        $objekWisata->nama = $request->nama;
        $objekWisata->alamat = $request->alamat;
        $objekWisata->fasilitas = $request->fasilitas;
        $objekWisata->gambar = $gambarPath;
        $objekWisata->latitude = $request->latitude;
        $objekWisata->longitude = $request->longitude;

        $objekWisata->save();

        return redirect()->route('objek_wisata')->with('success', 'Objek wisata berhasil ditambahkan.');
    }


    public function ubah(ObjekWisata $objekWisata, $id)
    {
        if ($ow = $objekWisata->find($id)) {
            return view('objek_wisata.ubah', [
                'ow' => $ow,
            ]);
        } else {
            return redirect()->route('objek_wisata')->with('failed', 'Id tidak ditemukan');
        }
    }

    public function simpan(ObjekWisata $objekWisata, Request $request, $id)
    {
        $objekWisata = $objekWisata->find($id);
        if (!$objekWisata) {
            return redirect()->route('objek_wisata')->with('failed', 'Id tidak ditemukan');
        }

        // Hapus gambar lama jika ada gambar baru yang diunggah
        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($objekWisata->gambar); // Menghapus gambar lama
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'fasilitas' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Update data objek wisata
        $objekWisata->nama = $request->nama;
        $objekWisata->alamat = $request->alamat;
        $objekWisata->fasilitas = $request->fasilitas;
        $objekWisata->latitude = $request->latitude;
        $objekWisata->longitude = $request->longitude;

        // Jika ada gambar baru, simpan gambar baru
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar_wisata', 'public');
            $objekWisata->gambar = $gambarPath;
        }

        $objekWisata->save();

        return redirect()->back()->with('success', 'Objek wisata berhasil diubah.');
    }

    public function hapus(ObjekWisata $objekWisata, $id)
    {
        $ow = $objekWisata->find($id);
        if (!$ow) {
            return redirect()->route('objek_wisata')->with('failed', 'Id tidak ditemukan');
        }

        // Hapus gambar dari penyimpanan jika ada
        if ($ow->gambar) {
            Storage::disk('public')->delete($ow->gambar);
        }

        $ow->delete();

        return redirect()->route('objek_wisata')->with('success', 'Objek wisata berhasil dihapus.');
    }
}
