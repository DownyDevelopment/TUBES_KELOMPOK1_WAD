<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'nama', 'nim', 'jurusan', 'alamat', 'no_hp'
    ];
}
