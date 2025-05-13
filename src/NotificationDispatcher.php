<?php

declare(strict_types=1);

namespace UVI\Notification;

use UVI\Notification\Contracts\UviNotification;

class NotificationDispatcher
{
    private ?UviNotification $baseNotification = null;

    public function send(UviNotification $notification): self
    {
        $this->baseNotification = $notification;
        return $this;
    }

    public function to(): void
    {
        
    }

    public function getBaseNotification(): ?UviNotification
    {
        return $this->baseNotification;
    }
}