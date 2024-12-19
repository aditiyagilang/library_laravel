<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Menentukan nama tabel yang digunakan (opsional jika tabel mengikuti konvensi)
    protected $table = 'users';

    // Menentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'password',
    ];

    // Menentukan kolom yang tidak dapat diubah secara massal
    protected $guarded = [];

    // Menentukan kolom yang akan diperlakukan sebagai tanggal (timestamps)
    protected $dates = [
        'email_verified_at',
    ];

    // Hash password sebelum disimpan
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
