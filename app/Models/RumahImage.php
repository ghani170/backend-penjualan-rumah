<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RumahImage extends Model
{
    protected $fillable = ['rumah_id', 'path'];

    public function rumah()
    {
        return $this->belongsTo(Rumah::class);
    }
}
