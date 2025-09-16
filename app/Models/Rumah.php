<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    protected $fillable = ['nama_rumah','deskripsi', 'harga', 'lokasi', 'luas_bangunan', 'luas_tanah', 'listrik', 'sertifikat'];

    public function images()
    {
        return $this->hasMany(RumahImage::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'rumah_tag',)
            ->withPivot('position')
            ->orderBy('pivot_position', 'asc');
    }
}
