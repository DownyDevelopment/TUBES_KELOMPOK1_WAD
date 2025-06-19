<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'nama', 'nip', 'bagian', 'alamat', 'no_hp'
    ];
}
