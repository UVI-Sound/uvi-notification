<?php

declare(strict_types=1);

namespace UVI\Notification\Google;

use Illuminate\Notifications\AnonymousNotifiable;

interface ToGoogleChat
{
    public function toGoogleChat(AnonymousNotifiable $notifiable): GoogleChatNotification;
}
