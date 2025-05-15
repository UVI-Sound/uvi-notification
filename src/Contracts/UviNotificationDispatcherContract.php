<?php

namespace UVI\Notification\Contracts;

use Illuminate\Notifications\Notification;

interface UviNotificationDispatcherContract
{
    public function send(mixed $notification): self;

    public function to(NotificationChannelContract $channel): self;

    public function getBaseNotification(): mixed;

    public function getRealNotification(): ?Notification;
}
