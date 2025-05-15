<?php

namespace UVI\Notification\Contracts;

use Illuminate\Notifications\Notification;

interface NotificationFactoryContract
{
    public function from(mixed $notification, NotificationChannelContract $channel): Notification;
}
