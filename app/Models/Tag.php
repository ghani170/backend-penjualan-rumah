<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['nama'];

    public function rumah()
    {
        return $this->belongsToMany(Rumah::class, 'rumah_tag');
    }
}
