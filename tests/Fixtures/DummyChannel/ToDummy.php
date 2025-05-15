<?php

namespace UVI\Notification\Tests\Fixtures\DummyChannel;

use Illuminate\Notifications\AnonymousNotifiable;

interface ToDummy
{
    public function toDummy(AnonymousNotifiable $notifiable): DummyNotification;
}