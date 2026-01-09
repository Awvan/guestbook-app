<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_category_id', // <-- Kolom Baru
        'title',
        'description',
        'event_date',
        'location',
        'quota'              // <-- Kolom Baru
    ];

    // Relasi: Satu Event punya Satu Kategori
    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }

    // Relasi: Satu Event punya Banyak Pendaftar
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
