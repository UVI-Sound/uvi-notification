<?php

declare(strict_types=1);

namespace UVI\Notification\Google;

interface GoogleChatNotification
{
    /**
     * @return mixed[]
     */
    public function toArray(): array;

    public function space(): string;
}
