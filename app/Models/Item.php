<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    // Kolom yang boleh diisi dari form
    protected $fillable = [
        'category_id', 'unit_id', 'supplier_id',
        'sku', 'name', 'barcode', 'min_stock', 'description',
    ];

    // Barang milik satu kategori
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Barang memakai satu satuan
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    // Barang berasal dari satu supplier (boleh kosong)
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    // Barang punya banyak baris stok (satu baris per lokasi)
    public function stocks(): HasMany
    {
        return $this->hasMany(ItemStock::class);
    }

    // Total stok = jumlah stok dari semua lokasi
    public function getTotalStockAttribute(): int
    {
        return (int) $this->stocks()->sum('quantity');
    }
}
