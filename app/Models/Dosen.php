<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = [
        'nama', 'nidn', 'prodi', 'alamat', 'no_hp'
    ];
}
