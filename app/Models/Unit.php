<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    // Kolom yang boleh diisi dari form
    protected $fillable = ['name', 'symbol'];

    // Satu satuan dipakai oleh banyak barang
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
