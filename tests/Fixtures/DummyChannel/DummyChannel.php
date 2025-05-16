<?php

namespace UVI\Notification\Tests\Fixtures\DummyChannel;

use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Notification;
use UVI\Notification\Contracts\NotificationChannelContract;

class DummyChannel implements NotificationChannelContract
{
    public function send(AnonymousNotifiable $notifiable, Notification $notification): self
    {
        if (! method_exists($notification, 'toDummy')) {
            throw new \RuntimeException('Notification must implement '.ToDummy::class);
        }

        if (!($message = $notification->toDummy($notifiable)) instanceof DummyNotification) {
            throw new \RuntimeException('Notification must return a '.DummyNotification::class);
        }

        \Log::info($message->message());

        return $this;
    }

    public function canAccept(mixed $notification): bool
    {
        return is_object($notification) && isset(class_implements($notification)[ToDummy::class]);
    }

    public function wrapNotification(mixed $notification): Notification
    {
        return new class($notification) extends Notification {
            public function __construct(protected ToDummy $notification){}

            /**
             * @return class-string[]
             */
            public function via(): array
            {
                return [self::class];
            }

            public function toDommy(AnonymousNotifiable $notifiable): DummyNotification
            {
                return $this->notification->toDummy($notifiable);
            }


        };
    }
}