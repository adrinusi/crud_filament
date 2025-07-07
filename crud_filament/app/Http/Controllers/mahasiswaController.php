<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa; 

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $katakunci = $request->katakunci;

    if ($katakunci) {
        $mahasiswa = Mahasiswa::where('nama', 'like', "%$katakunci%")
            ->orWhere('nim', 'like', "%$katakunci%")
            ->orWhere('nilai', 'like', "%$katakunci%")
            ->get();
    } else {
        $mahasiswa = Mahasiswa::all();
    }

    return view('mahasiswa.index', compact('mahasiswa'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
{
    $request->validate([
        'nim' => 'required|numeric|unique:mahasiswa,nim',
        'nama' => 'required|string|max:255',
        'nilai' => 'required|in:A,B,C,D',
    ]);

    \App\Models\Mahasiswa::create([
        'nim' => $request->nim,
        'nama' => $request->nama,
        'nilai' => $request->nilai,
    ]);

    return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
{
    $mahasiswa = Mahasiswa::findOrFail($nim);
    return view('mahasiswa.edit', compact('mahasiswa'));
}
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
{
    // Validasi input
    $request->validate([
        'nim' => 'required|numeric',
        'nama' => 'required|string|max:255',
        'nilai' => 'required|in:A,B,C,D',
    ]);

    // Cari data mahasiswa berdasarkan nim
    $mahasiswa = Mahasiswa::findOrFail($nim);

    // Update data mahasiswa
    $mahasiswa->update([
        'nim' => $request->nim,
        'nama' => $request->nama,
        'nilai' => $request->nilai,
    ]);

    return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
{
    // Cari data berdasarkan NIM
    $mahasiswa = Mahasiswa::findOrFail($nim);

    // Hapus data
    $mahasiswa->delete();

    return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
}

}
