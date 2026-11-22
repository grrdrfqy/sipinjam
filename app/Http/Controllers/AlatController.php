<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAlatRequest;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $alat = Alat::orderBy('kode')->paginate(10);

    return view('alat.index', compact('alat'));
}
    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    return view('alat.create');
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|min:3',
        'lokasi' => 'nullable|string',
    ], [
        'nama.required' => 'Nama alat wajib diisi.',
        'nama.min' => 'Nama alat minimal 3 karakter.',
    ]);

    Alat::create($validated);

    return redirect()->route('alat.index')
        ->with('success', 'Data alat berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(Alat $alat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit(Alat $alat)
{
    return view('alat.edit', compact('alat'));
}

public function update(Request $request, Alat $alat)
{
    $validated = $request->validate([
        'nama' => 'required|min:3|unique:alats,nama,' . $alat->id,
        'lokasi' => 'nullable|string',
    ], [
        'nama.required' => 'Nama alat wajib diisi.',
        'nama.min' => 'Nama alat minimal 3 karakter.',
        'nama.unique' => 'Nama alat sudah digunakan.',
    ]);

    $alat->update($validated);

    return redirect()->route('alat.index')
        ->with('success', 'Data alat berhasil diperbarui.');
}

public function destroy(Alat $alat)
{
    $alat->delete();

    return redirect()->route('alat.index')
        ->with('success', 'Alat berhasil dihapus.');
}
}
