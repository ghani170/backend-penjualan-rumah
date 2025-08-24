<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function index() {
        $products = Rumah::with(['images', 'tags'])->get();
        return view('admin.index', compact('products'));
    }

    public function showcreate() {
        $tags = \App\Models\Tag::all();
        return view('admin.tambahproduk', compact('tags'));

    }

    public function store(Request $request) {
        $data = $request->validate([
            'nama_rumah' => 'required',
            'deskripsi'  => 'required',
            'harga'      => 'required',
            'lokasi'     => 'required',
            'gambar1'    => 'required|image|mimes:jpeg,png,jpg|max:20048',
            'gambar2'    => 'required|image|mimes:jpeg,png,jpg|max:20048',
            'gambar3'    => 'required|image|mimes:jpeg,png,jpg|max:20048',
            'gambar4'    => 'required|image|mimes:jpeg,png,jpg|max:20048',
            'gambar5'    => 'required|image|mimes:jpeg,png,jpg|max:20048',
            'tags'       => 'array',
            'tags'       => 'required|array|min:1',
            'tags.*'     => 'exists:tags,id',
        ]);

        $rumah = Rumah::create($data);

        foreach (['gambar1','gambar2','gambar3','gambar4','gambar5'] as $key) {
            if ($request->hasFile($key)) {
                $path = $request->file($key)->store('rumah', 'public');
                $rumah->images()->create(['path' => $path]);
            }
        }

        if (count($data['tags']) !== count(array_unique($data['tags']))) {
            return back()->withErrors(['tags' => 'Tidak boleh memilih tag yang sama lebih dari sekali.'])
                        ->withInput();
        }

        if ($request->has('tags')) {
            $rumah->tags()->sync($request->input('tags'));
        }

        return redirect()->route('admin.tambahproduk')->with('success', 'Produk berhasil ditambahkan');
    }
}
