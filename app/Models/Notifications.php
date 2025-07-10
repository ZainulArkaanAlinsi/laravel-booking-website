<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = ['id' => 'string'];

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}
