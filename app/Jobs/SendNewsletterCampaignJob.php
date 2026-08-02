<?php

namespace App\Jobs;

use App\Mail\NewsletterCampaignMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendNewsletterCampaignJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public string $email,
        public string $subject,
        public string $body
    ) {
    }

    public function handle(): void
    {
        Mail::to($this->email)->send(
            new NewsletterCampaignMail(
                $this->subject,
                $this->body
            )
        );
    }
}