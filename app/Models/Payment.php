<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $tables = 'payments';

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'c_id');
    }
    public function Methode()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }
}
