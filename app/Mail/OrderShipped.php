<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Bill;
use App\Customer;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $billtomail;
    protected $custormer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Bill $billtomail, Customer $custormer)
    {
        $this->billtomail = $billtomail;
        $this->custormer = $custormer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    

    public function build()
    {
        return $this->view('mail.mail')
                   ->with([
                       'last_name' => $this->custormer->last_name,
                       'first_name' => $this->custormer->first_name,
                       'email' => $this->custormer->email,
                       'phone_number' => $this->custormer->phone_number,
                       'bill_id' => $this->billtomail->id,
                       'date_order' => $this->billtomail->date_order,
                       'total' => $this->billtomail->total,
                       'address' => $this->billtomail->order_address,
                       'order_code' => $this->billtomail->order_code,
                   ]);
    }
}
