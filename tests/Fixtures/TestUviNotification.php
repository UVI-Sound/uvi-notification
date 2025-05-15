<?php

namespace UVI\Notification\Tests\Fixtures;

use Illuminate\Notifications\AnonymousNotifiable;
use UVI\Notification\Google\BaseGoogleChatNotification;
use UVI\Notification\Google\GoogleChatNotification;
use UVI\Notification\Google\ToGoogleChat;

class TestUviNotification implements ToGoogleChat
{
    public function title(): string
    {
        return fake()->sentence();
    }

    public function message(): string
    {
        return implode('', fake()->sentences(4));
    }

    public function space(): string
    {
        return config('uvi-notification.channels.google_chat.spaces.test');
    }

    public function toGoogleChat(AnonymousNotifiable $notifiable): GoogleChatNotification
    {
        return new class($this->title(), $this->message(), $this->space()) extends BaseGoogleChatNotification {};
    }
}
