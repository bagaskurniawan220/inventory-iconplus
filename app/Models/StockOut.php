<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockOut extends Model
{
    // Kolom yang boleh diisi
    protected $fillable = [
        'item_id', 'location_id', 'item_serial_id', 'user_id',
        'quantity', 'reference_no', 'transaction_date', 'notes',
    ];

    // Tanggal transaksi dibaca sebagai tanggal
    protected $casts = [
        'transaction_date' => 'date',
    ];

    // Barang yang keluar
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    // Lokasi asal barang
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    // Unit ber-serial number (boleh kosong)
    public function itemSerial(): BelongsTo
    {
        return $this->belongsTo(ItemSerial::class);
    }

    // Petugas yang menginput
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
