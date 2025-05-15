<?php

namespace UVI\Notification\Tests\Fixtures\DummyChannel;

interface DummyNotification
{
    public function message(): string;
}