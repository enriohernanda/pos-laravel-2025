<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index()
    {
        return view('belajar');
    }

    public function tambah()
    {
        return view('tambah');
    }

    public function storeTambah(Request $request)
    {
        // $angka1 = $request->angka1;
        $angka1 = $request->post('angka1');
        $angka2 = $request->post('angka2');

        $jumlah = $angka1 + $angka2;
        return view('tambah', compact('jumlah'));
        // return  "Hasil pertambahan " . $angka1 . " + " . $angka2 . " = " . $jumlah;
    }

    public function kurang()
    {
        return view('kurang');
    }
    public function storeKurang(Request $request)
    {
        // $angka1 = $request->angka1;
        $angka1 = $request->post('angka1');
        $angka2 = $request->post('angka2');

        $jumlah = $angka1 - $angka2;
        return view('kurang', compact('jumlah'));
        // return  "Hasil pengurangan " . $angka1 . " - " . $angka2 . " = " . $jumlah;
    }
    public function bagi()
    {
        return view('bagi');
    }
    public function storeBagi(Request $request)
    {
        // $angka1 = $request->angka1;
        $angka1 = $request->post('angka1');
        $angka2 = $request->post('angka2');

        $jumlah = $angka1 / $angka2;
        return view('bagi', compact('jumlah'));
    }
    public function kali()
    {
        return view('kali');
    }
    public function storeKali(Request $request)
    {
        // $angka1 = $request->angka1;
        $angka1 = $request->post('angka1');
        $angka2 = $request->post('angka2');

        $jumlah = $angka1 * $angka2;
        return view('kali', compact('jumlah'));
    }
}
