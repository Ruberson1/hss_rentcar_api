<?php

namespace App\Http\Interfaces\Services\Email;

interface ISendEmail
{
    public function emailNotification($data): void;
}
