<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    use HasFactory;

    // WAJIB ADA biar bisa di-create dari Controller
    protected $fillable = [
        'registration_id',
        'nim',
        'university',
        'major',
        'semester',
    ];

    // Relasi balik ke Registration
    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
