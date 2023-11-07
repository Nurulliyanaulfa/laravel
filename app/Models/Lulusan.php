<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lulusan extends Model
{
    use HasFactory;

    protected $table = 'lulusan'; // Nama tabel di database

    protected $fillable = [
        'nama',
        'jurusan',
        'judul',
        'ipk',
        'foto',
    ];
}

