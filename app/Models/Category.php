<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // Kolom yang boleh diisi dari form
    protected $fillable = ['name', 'description'];

    // Satu kategori punya banyak barang
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
