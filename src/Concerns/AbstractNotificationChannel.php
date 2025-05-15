<?php

namespace UVI\Notification\Concerns;

use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Notification;
use UVI\Notification\Contracts\NotificationChannelContract;

abstract class AbstractNotificationChannel implements NotificationChannelContract
{
    public function canAccept(mixed $notification): bool
    {
        return is_object($notification) && isset(class_implements($notification)[$this->baseNotificationClassName()]);
    }

    abstract public function send(AnonymousNotifiable $notifiable, Notification $notification): NotificationChannelContract;


    abstract public function wrapNotification(mixed $notification): Notification;

    /**
     * @return class-string
     */
    abstract public function baseNotificationClassName(): string;
}