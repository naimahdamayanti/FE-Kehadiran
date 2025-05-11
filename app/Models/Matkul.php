<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    protected $table = 'tb_matkul';
    protected $primaryKey = 'id_matkul';
    public $timestamps = false;
    protected $fillable = ['id_matkul', 'nama_matkul', 'sks', 'semester'];
}
