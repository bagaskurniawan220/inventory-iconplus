<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemSerial extends Model
{
    // Kolom yang boleh diisi
    protected $fillable = [
        'item_id', 'location_id', 'serial_number', 'qr_token', 'status', 'notes',
    ];

    // Unit ini adalah bagian dari satu jenis barang
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    // Lokasi unit saat ini (boleh kosong)
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
