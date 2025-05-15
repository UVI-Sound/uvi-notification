<?php

namespace UVI\Notification\Google;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use UVI\Notification\Concerns\AbstractNotificationChannel;

class GoogleChatChannel extends AbstractNotificationChannel
{
    /**
     * @throws ConnectionException
     */
    public function send(AnonymousNotifiable $notifiable, Notification $notification): self
    {
        if (! method_exists($notification, 'toGoogleChat')) {
            throw new \RuntimeException('Notification must implement '.ToGoogleChat::class);
        }

        if (!($message = $notification->toGoogleChat($notifiable)) instanceof GoogleChatNotification) {
            throw new \RuntimeException('Notification must return a '.GoogleChatNotification::class);
        }

        Http::send('post', $message->space(), [
            'json' => $message->toArray(),
        ]);

        return $this;
    }

    public function wrapNotification(mixed $notification): Notification
    {
        if (! $notification instanceof ToGoogleChat) {
            throw new \RuntimeException('Notification must implement '.ToGoogleChat::class);
        }

        return new class($notification) extends Notification {
            public function __construct(protected ToGoogleChat $notification){}

            /**
             * @return class-string[]
             */
            public function via(): array
            {
                return [GoogleChatChannel::class];
            }

            public function toGoogleChat(AnonymousNotifiable $notifiable): GoogleChatNotification
            {
                return $this->notification->toGoogleChat($notifiable);
            }
        };
    }

    public function baseNotificationClassName(): string
    {
        return ToGoogleChat::class;
    }
}
