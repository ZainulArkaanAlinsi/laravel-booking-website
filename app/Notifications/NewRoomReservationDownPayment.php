<?php

namespace App\Notifications;

use App\Helpers\Helper;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewRoomReservationDownPayment extends Notification
{
    use Queueable;
    public $transaction;
    public $payment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Transaction $transaction, Payment $payment)
    {
        $this->transaction = $transaction;
        $this->payment = $payment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            // 'mail',
            'database',
            'broadcast'
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public static function convertToRupiah($price)
    {
        $price_rupiah = "Rp. " . number_format($price, 2, ',', '.');
        return $price_rupiah;
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Room '.$this->transaction->room->number . ' has been reservated by ' . $this->transaction->customer->name)
            ->line('Payment: ' . $this->convertToRupiah($this->payment->price))
            ->line('Status: ' . $this->payment->status.' Success')
            ->action('See invoice', route('payment.invoice',['payment'=>$this->payment->id]));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        // dd($this->transaction->Customer);
        return [
            'message' => 'Room ' . $this->transaction->Room->no . ' reservated by ' . $this->transaction->Customer->name . '. Payment: ' . $this->convertToRupiah($this->payment->price),
            'url' => '/dashboard/order/history-pay/'.$this->payment->id
            // dd('message');
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'message' => 'Room ' . $this->transaction->room->number . ' reservated by ' . $this->transaction->customer->name,
            'url' => '/dashboard/order/history-pay/'.$this->payment->id
        ]);
    }
}
