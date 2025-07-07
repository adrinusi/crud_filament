<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';      // pakai nim sebagai primary key
    public $incrementing = false;       // karena nim bukan auto increment
    protected $keyType = 'int';         // karena nim adalah integer

    protected $fillable = ['nim', 'nama', 'nilai'];
}
