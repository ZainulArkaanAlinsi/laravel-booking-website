<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    // Relasi ke transaksi
    public function Transactions()
    {
        return $this->hasMany(Transaction::class, 'c_id');
    }

    // Relasi ke user (user yang memiliki customer ini)
    public function User()
    {
        return $this->hasOne(User::class, 'c_id');
    }

    // Relasi ke pembayaran
    public function Payments()
    {
        return $this->hasMany(\App\Models\Payment::class, 'c_id');
    }
}
