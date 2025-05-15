<?php

declare(strict_types=1);

namespace UVI\Notification;

use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification as NotificationFacade;
use UVI\Notification\Contracts\NotificationChannelContract;
use UVI\Notification\Contracts\NotificationFactoryContract;
use UVI\Notification\Contracts\UviNotificationDispatcherContract;
use UVI\Notification\Exceptions\DispatchingWithoutNotificationException;

/**
 * Dispatcher for UVI notifications.
 */
class UviNotificationDispatcher implements UviNotificationDispatcherContract
{
    private mixed $baseNotification;

    private Notification $notification;

    public function __construct(protected NotificationFactoryContract $factory) {}

    public function send(mixed $notification): self
    {
        $this->baseNotification = $notification;

        return $this;
    }

    /**
     * @throws DispatchingWithoutNotificationException
     */
    public function to(NotificationChannelContract $channel): self
    {
        if (! isset($this->baseNotification)) {
            throw new DispatchingWithoutNotificationException;
        }

        // Transforme our custom notification into Laravel one
        $this->notification = $this->factory->from($this->baseNotification, $channel);

        NotificationFacade::send(new AnonymousNotifiable, $this->notification);

        return $this;
    }

    public function getBaseNotification(): mixed
    {
        return $this->baseNotification ?? null;
    }

    public function getRealNotification(): ?Notification
    {
        return $this->notification ?? null;
    }
}
