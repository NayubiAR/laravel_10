<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterEmail extends Mailable
{
    use Queueable, SerializesModels;
    // Code line dibawah ini bisa dihilangkan jika menggunakan php 8
    private User $user;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        // Code line dibawah ini bisa dihilangkan jika menggunakan php 8
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Terima kasih sudah bergabung diwebsite kami' . config('app.name', ''),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome_email',
            with: [
                'user' => $this->user,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // Bisa menggirim file menggunakan attachment
        // return [
        //      Attachment::fromStorageDisk('public','profile/namafile')
        // ]
        return [];
    }
}