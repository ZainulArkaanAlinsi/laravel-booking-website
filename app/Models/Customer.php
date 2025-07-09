<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory, Notifiable;
    protected $guarded = ['id'];
    public function Transactions(){
        return $this->hasMany(Transaction::class);
    }
    public function User(){
        return $this->hasOne(User::class, 'id');
    }
}
