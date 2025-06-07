<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\App;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Repositories\Logos\LogooRepositoryInterface;

class CheckoutMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cart_items;
    public $customer_info;

    /**
     * Create a new message instance.
     */
    public function __construct(
        $cart_items, 
        $customer_info,
    )
    {
        $this->cart_items = $cart_items;
        $this->customer_info = $customer_info;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Checkout',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $logoRepos = App::make(LogooRepositoryInterface::class);

        return new Content(
            view: 'mails.checkout-mail',
            with: [
                'logo' => $logoRepos->getLogoHeader()->pic,
                'cart-items' => $this->cart_items,
                'customer-info' => $this->customer_info,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
