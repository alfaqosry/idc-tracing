<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Priode;

class PriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priode = Priode::all();
        return view('pages.priode.index', compact('priode'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
  

public function store(Request $request)
{
    $request->validate([
        'nama_priode' => 'required|string|max:255',
        'is_active' => 'required|boolean',
        'mulai' => 'required|date',
        'berakhir' => 'required|date|after_or_equal:mulai',
    ]);

    // Validasi untuk mencegah tanggal beririsan
    $isOverlapping = Priode::where(function ($query) use ($request) {
        $query->whereBetween('mulai', [$request->mulai, $request->berakhir])
              ->orWhereBetween('berakhir', [$request->mulai, $request->berakhir])
              ->orWhere(function ($query) use ($request) {
                  $query->where('mulai', '<=', $request->mulai)
                        ->where('berakhir', '>=', $request->berakhir);
              });
    })->exists();

    if ($isOverlapping) {
        return redirect()->back()->with('error', 'Tanggal priode yang Anda masukkan beririsan dengan priode yang sudah ada.');
    }

    Priode::create($request->all());

    return redirect()->route('priode.index')->with('success', 'Priode berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_priode' => 'required|string|max:255',
            'is_active' => 'required|boolean',
            'mulai' => 'required|date',
            'berakhir' => 'required|date|after_or_equal:mulai',
        ]);
    
        $priode = Priode::findOrFail($id);
        $priode->update($request->all());
    
        return redirect()->route('priode.index')->with('success', 'Priode berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $priode = Priode::findOrFail($id);

        $priode->delete();
    
        return redirect()->route('priode.index')->with('success', 'Priode berhasil dihapus.');
    }
}
