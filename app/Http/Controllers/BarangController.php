<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Aplikasi THT | Dashboard',
            'barang' => Barang::orderBy('id', 'asc')->get(),
            'kategori' => Kategori::all(),
            'active' => 'data_produk'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create', [
            'title' => 'Aplikasi THT | Add New Data',
            'kategori' => Kategori::all(),
            'active' => 'data_produk'

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = ([
            'nama_produk' => 'required|unique:barang',
            'kategori_produk' => 'required',
            'harga_barang' => 'required|integer',
            'harga_jual' => 'required|integer',
            'stok' => 'required|integer',
            'image' => 'image|file|max:100',
        ]);
        $validate = $request->validate($rules);
        if ($request->file('image')) {
            $validate['image'] = $request->file('image')->store('gambar_produk');
        }
        Barang::create($validate);
        return redirect('/dashboard')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('dashboard.edit', [
            'title' => 'Aplikasi THT | Add New Data',
            'kategori' => Kategori::all(),
            'barang' => Barang::find($id),
            'active' => 'data_produk'

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $rules = ([
            'kategori_produk' => 'required',
            'harga_barang' => 'required|integer',
            'harga_jual' => 'required|integer',
            'stok' => 'required|integer',
            'image' => '|image|file|max:100',
        ]);
        if ($request->nama_produk != $barang->nama_produk) {
            $rules['nama_produk'] = 'required|unique:barang';
        }
        $validate = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validate['image'] = $request->file('image')->store('gambar_produk');
        }
        $barang->update($validate);
        return redirect('/dashboard')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        if ($barang->image) {
            Storage::delete($barang->image);
        }
        $barang->delete();
        return redirect('/dashboard')->with('success', 'Data berhasil dihapus');
    }
}
