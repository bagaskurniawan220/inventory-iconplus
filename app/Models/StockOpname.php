<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockOpname extends Model
{
    // Kolom yang boleh diisi
    protected $fillable = [
        'item_id', 'location_id', 'user_id', 'approved_by',
        'system_quantity', 'physical_quantity', 'difference',
        'reason', 'status', 'approved_at',
    ];

    // Waktu persetujuan dibaca sebagai tanggal dan jam
    protected $casts = [
        'approved_at' => 'datetime',
    ];

    // Barang yang diperiksa
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    // Lokasi yang diperiksa
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    // Petugas pemeriksa
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Admin yang menyetujui (boleh kosong)
    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
