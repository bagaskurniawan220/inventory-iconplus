<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Kolom yang boleh diisi
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Kolom yang disembunyikan saat data diubah jadi array/JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Pengaturan tipe data kolom
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Mengecek apakah pengguna adalah admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Mengecek apakah pengguna adalah petugas gudang
    public function isPetugas(): bool
    {
        return $this->role === 'petugas';
    }
}
