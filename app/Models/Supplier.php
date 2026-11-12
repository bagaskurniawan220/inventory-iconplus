<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    // Kolom yang boleh diisi dari form
    protected $fillable = ['name', 'phone', 'email', 'address', 'description'];

    // Satu supplier punya banyak barang
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
