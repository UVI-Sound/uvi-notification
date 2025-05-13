<?php

declare(strict_types=1);

namespace UVI\Notification\Google;

interface ToGoogleChat
{
    public function toGoogleChat(): GoogleChatNotification;
}