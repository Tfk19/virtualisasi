<?php

namespace App\Http\Controllers;

use App\Models\DimensiBuku;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DimensiBukuController extends Controller
{
    public function index()
    {
        // Query untuk mengambil data buku dan menghitung jumlah buku per rating
        $ratings = DimensiBuku::select('Rating', DB::raw('count(*) as total'))
            ->groupBy('Rating')
            ->get();

        // Ambil semua data buku untuk ditampilkan di tabel
        $books = DimensiBuku::all();

        return view('dimensi_buku.index', compact('ratings', 'books'));
    }

    public function create()
    {
        return view('dimensi_buku.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_buku' => 'required',
            'harga' => 'required|numeric',
            'jumlah_halaman' => 'required|integer',
            'rating' => 'required|numeric',
        ]);

        // Simpan data ke database
        DimensiBuku::create([
            'Nama_Buku' => $validatedData['nama_buku'],
            'Harga' => $validatedData['harga'],
            'Jumlah_Halaman' => $validatedData['jumlah_halaman'],
            'Rating' => $validatedData['rating'],
        ]);

        return redirect()->route('dimensibuku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $book = DimensiBuku::findOrFail($id);
        return view('dimensi_buku.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'Nama_Buku' => 'required',
            'Harga' => 'required|numeric',
            'Jumlah_Halaman' => 'required|integer',
            'Rating' => 'required|numeric',
        ]);


        // Update data yang ada di database
        DimensiBuku::where('ID_Buku', $id)->update($validatedData);

        // Redirect ke halaman index atau ke halaman detail
        return redirect()->route('dimensibuku.index');
    }

    public function destroy($id)
{
    $book = DimensiBuku::findOrFail($id);
    $book->delete();

    return redirect()->route('dimensibuku.index')->with('success', 'Buku berhasil dihapus');
}
}
