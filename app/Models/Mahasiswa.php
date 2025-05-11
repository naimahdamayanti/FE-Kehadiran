<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'npm';
    public $timestamps = false;

    protected $fillable = ['npm', 'nama', 'mata_kuliah','jurusan', 'prodi', 'tahun_akademik'];
}
