<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    // Kolom yang boleh diisi dari form
    protected $fillable = ['parent_id', 'code', 'name', 'type', 'description', 'is_active'];

    // Mengubah is_active dari angka 0/1 menjadi benar/salah
    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Lokasi induk. Contoh: induk dari Rak adalah Area
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'parent_id');
    }

    // Lokasi anak. Contoh: anak dari Area adalah Rak
    public function children(): HasMany
    {
        return $this->hasMany(Location::class, 'parent_id');
    }

    // Stok barang yang tersimpan di lokasi ini
    public function itemStocks(): HasMany
    {
        return $this->hasMany(ItemStock::class);
    }
}
