<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockIn extends Model
{
    // Kolom yang boleh diisi
    protected $fillable = [
        'item_id', 'location_id', 'supplier_id', 'item_serial_id', 'user_id',
        'quantity', 'reference_no', 'transaction_date', 'notes',
    ];

    // Tanggal transaksi dibaca sebagai tanggal, bukan teks biasa
    protected $casts = [
        'transaction_date' => 'date',
    ];

    // Barang yang masuk
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    // Lokasi penyimpanan tujuan
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    // Supplier pengirim (boleh kosong)
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
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
