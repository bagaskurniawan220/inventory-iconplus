<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemStock extends Model
{
    // Kolom yang boleh diisi
    protected $fillable = ['item_id', 'location_id', 'quantity'];

    // Baris stok ini milik satu barang
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    // Baris stok ini berada di satu lokasi
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
