<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $data) {}

    /**
     * 件名（ユーザー向け）
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '【GLOBE NATION】お問い合わせありがとうございます',
        );
    }

    /**
     * メール本文
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.user.contact',
            with: [
                'data' => $this->data,
            ],
        );
    }

    /**
     * 添付ファイル
     */
    public function attachments(): array
    {
        return [];
    }
}
