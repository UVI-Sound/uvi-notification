<?php

declare(strict_types=1);

namespace UVI\Notification;

use Illuminate\Support\Arr;
use UVI\Notification\Contracts\NotificationChannelContract;
use UVI\Notification\Contracts\UviNotificationDispatcherContract;

class UviNotificationService
{
    public function __construct(protected UviNotificationDispatcherContract $dispatcher) {}

    /**
     * @param mixed $notification
     * @param NotificationChannelContract[]|NotificationChannelContract $channels
     * @return UviNotificationDispatcherContract
     */
    public function send(mixed $notification, array|NotificationChannelContract $channels): UviNotificationDispatcherContract
    {
        /** @var NotificationChannelContract[] $channels */
        $channels = Arr::wrap($channels);

        if (empty($channels)) {
            throw new \InvalidArgumentException('You must specify at least one channel');
        }
        $this->dispatcher->send($notification);

        collect($channels)->each(fn (NotificationChannelContract $channel) => $this->dispatcher->to($channel));

        return $this->dispatcher;
    }
}
