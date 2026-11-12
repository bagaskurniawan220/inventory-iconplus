<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    // Kolom yang boleh diisi
    protected $fillable = ['user_id', 'action', 'description'];

    // Pelaku aktivitas (boleh kosong)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
