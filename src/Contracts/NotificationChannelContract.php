<?php

namespace UVI\Notification\Contracts;

use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Notification;

interface NotificationChannelContract
{
    public function send(AnonymousNotifiable $notifiable, Notification $notification): self;

    public function canAccept(mixed $notification): bool;

    public function wrapNotification(mixed $notification): Notification;

}