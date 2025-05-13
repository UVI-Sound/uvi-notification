<?php

declare(strict_types=1);

namespace UVI\Notification;

use UVI\Notification\Contracts\UviNotification;

class NotificationService
{
    public function send(UviNotification $notification): NotificationDispatcher
    {
        return app(NotificationDispatcher::class)->send($notification);
    }
}