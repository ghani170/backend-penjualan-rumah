<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
     public function index() {
        $products = Rumah::with(['images'])->get();
        return view('admin.index', compact('products'));
    }

    

    public function store(Request $request) {
        $data = $request->validate([
            'nama_rumah' => 'required',
            'deskripsi'  => 'required',
            'harga'      => 'required',
            'lokasi'     => 'required',
            'luas_bangunan' => 'required',
            'luas_tanah' => 'required',
            'listrik' => 'required',
            'sertifikat' => 'required',
            'gambar1'    => 'required|image|mimes:jpeg,png,jpg|max:20048',
            'gambar2'    => 'required|image|mimes:jpeg,png,jpg|max:20048',
            'gambar3'    => 'required|image|mimes:jpeg,png,jpg|max:20048',
            'gambar4'    => 'required|image|mimes:jpeg,png,jpg|max:20048',
            'gambar5'    => 'required|image|mimes:jpeg,png,jpg|max:20048',
        ]);

        $rumah = Rumah::create($data);

        $index = 1;
        foreach (['gambar1','gambar2','gambar3','gambar4','gambar5'] as $key) {
            if ($request->hasFile($key)) {
                $path = $request->file($key)->store('rumah', 'public');
                $rumah->images()->create([
                    'path' => $path,
                    'position' => $index
                ]);
            }
            $index++;
        }


        


        return redirect()->route('admin.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Rumah $rumah) {
        return response()->json([
            'rumah' => $rumah->load('images'),
        ]);
    }


    public function updateRumah(Request $request, Rumah $rumah) {
        $data = $request->validate([
            'nama_rumah' => 'required',
            'deskripsi'  => 'required',
            'harga'      => 'required',
            'lokasi'     => 'required',
            'luas_bangunan' => 'required',
            'luas_tanah' => 'required',
            'listrik' => 'required',
            'sertifikat' => 'required',
            'gambar1'    => 'image|mimes:jpeg,png,jpg|max:20048',
            'gambar2'    => 'image|mimes:jpeg,png,jpg|max:20048',
            'gambar3'    => 'image|mimes:jpeg,png,jpg|max:20048',
            'gambar4'    => 'image|mimes:jpeg,png,jpg|max:20048',
            'gambar5'    => 'image|mimes:jpeg,png,jpg|max:20048',
            
        ]);


        // Perbarui data Rumah terlebih dahulu
        $rumah->update($data);


       $index = 1;
        foreach (['gambar1','gambar2','gambar3','gambar4','gambar5'] as $key) {
            if ($request->hasFile($key)) {
                $path = $request->file($key)->store('rumah', 'public');

                // Cari gambar lama berdasarkan position
                $oldImage = $rumah->images()->where('position', $index)->first();

                if ($oldImage) {
                    // Hapus file lama
                    Storage::disk('public')->delete($oldImage->path);

                    // Update path baru
                    $oldImage->update(['path' => $path]);
                } else {
                    // Kalau belum ada, buat baru
                    $rumah->images()->create([
                        'path' => $path,
                        'position' => $index
                    ]);
                }
            }
            $index++;
        }


        return redirect()->route('admin.index')->with('success', 'Produk berhasil diupdate');
    }

    public function destroy(Rumah $rumah) {
        $rumah->delete();
        return redirect()->route('admin.index')->with('success', 'Produk berhasil dihapus');
    }
}
