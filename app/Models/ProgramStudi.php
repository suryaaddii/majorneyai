<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'program_studi';

    protected $fillable = [
        'nama',
        'deskripsi',
        'prospek_kerja',
        'kampus_rekomendasi'
    ];

    protected $casts = [
        'kampus_rekomendasi' => 'array'
    ];

    // Accessor untuk mendapatkan nama dalam format lowercase
    public function getNamaLowerAttribute()
    {
        return strtolower($this->nama);
    }
}