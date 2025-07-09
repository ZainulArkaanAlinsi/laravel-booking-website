<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'check_in' => 'datetime',
        'check_out' => 'datetime',
    ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'c_id');
    }
    public function Room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
    public function Payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function getTotalPrice()
    {
        $day = $this->check_in->diffindays($this->check_out);
        $room_price = $this->room->price;
        $total_price = $room_price * $day;
        return $total_price;
    }

    public function getDateDifferenceWithPlural()
    {
        $day = $this->check_in->diffindays($this->check_out);
        $plural = Str::plural('Day', $day);
        return $day . ' ' . $plural;
    }

    public function getTotalPayment()
    {
        $totalPayment = 0;
        foreach ($this->Payments as $payment) {
            if ($payment->status == 'Pending') {
                $totalPayment = 0;
            } else {
                $totalPayment += $payment->price;
            }
        }
        return $totalPayment;
    }

    public function getMinimumDownPayment()
    {
        $dayDifference =  $this->check_in->diffindays($this->check_out);
        $minimumDownPayment = ($this->room->price * $dayDifference) * 0.15;
        return $minimumDownPayment;
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'c_id');
    }
}
