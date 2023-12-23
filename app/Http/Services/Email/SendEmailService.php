<?php

namespace App\Http\Services\Email;

use App\Http\Interfaces\Services\Email\ISendEmailService;
use App\Mail\Sendmail;
use Illuminate\Support\Facades\Mail;

class SendEmailService implements ISendEmailService
{

    public function emailNotification($data): void
    {
        Mail::to($data['user_email'])->send(new Sendmail($data));
    }
}
