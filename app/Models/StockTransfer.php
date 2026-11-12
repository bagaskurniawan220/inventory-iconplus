<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockTransfer extends Model
{
    // Kolom yang boleh diisi
    protected $fillable = [
        'item_id', 'item_serial_id', 'from_location_id', 'to_location_id',
        'user_id', 'quantity', 'transaction_date', 'notes',
    ];

    // Tanggal transaksi dibaca sebagai tanggal
    protected $casts = [
        'transaction_date' => 'date',
    ];

    // Barang yang dipindahkan
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    // Unit ber-serial number (boleh kosong)
    public function itemSerial(): BelongsTo
    {
        return $this->belongsTo(ItemSerial::class);
    }

    // Lokasi asal
    public function fromLocation(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'from_location_id');
    }

    // Lokasi tujuan
    public function toLocation(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'to_location_id');
    }

    // Petugas yang menginput
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
