<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
     public function index() {
        $products = Rumah::with(['images', 'tags'])->get();
        $tags = Tag::all();
        return view('admin.index', compact('products', 'tags'));
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
            'tags'       => 'required|array|min:1',
            'tags.*'     => 'exists:tags,id',
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


        if (count($data['tags']) !== count(array_unique($data['tags']))) {
            return back()->withErrors(['tags' => 'Tidak boleh memilih tag yang sama lebih dari sekali.'])
                        ->withInput();
        }

        if ($request->has('tags')) {
            $tags = $request->input('tags');
            $syncData = [];
            foreach ($tags as $index => $tagId) {
                $syncData[$tagId] = ['position' => $index + 1];
            }
            $rumah->tags()->sync($syncData);
        }


        return redirect()->route('admin.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Rumah $rumah) {
        $tags = Tag::all();
        return response()->json([
            'rumah' => $rumah->load('tags','images'),
            'tags'  => $tags
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
            'tags'       => 'array|min:1',
            'tags.*'     => 'exists:tags,id',
        ]);

        // Pindah validasi duplikasi ke sini
        if (count($data['tags']) !== count(array_unique($data['tags']))) {
            return back()->withErrors(['tags' => 'Tidak boleh memilih tag yang sama lebih dari sekali.'])->withInput();
        }

        // Perbarui data Rumah terlebih dahulu
        $rumah->update($data);

        // Sekarang, sinkronkan tag setelah data rumah diperbarui
        if ($request->has('tags')) {
            $tags = $request->input('tags'); 
            $syncData = [];
            foreach ($tags as $index => $tagId) {
                $syncData[$tagId] = ['position' => $index + 1];
            }
            $rumah->tags()->sync($syncData);
        }


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
