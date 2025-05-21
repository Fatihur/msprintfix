<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Wa;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wa=Wa::first();

        return view('beranda.home',compact('wa'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function produk(Request $request)
    {     $wa=Wa::first();
        $selectedCategory = $request->get('category', 'all');
        $kategoris = Kategori::all();

        if ($selectedCategory == 'all') {
            $produks = Produk::paginate(12);
        } else {
            $produks = Produk::where('kategori_id', $selectedCategory)->paginate(12);
        }

        return view('beranda.produk', compact('kategoris', 'produks', 'selectedCategory','wa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {     $wa=Wa::first();

        $produk = Produk::findOrFail($id);
        return view('beranda.show', compact('produk','wa'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
