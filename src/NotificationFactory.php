<?php

namespace UVI\Notification;

use Illuminate\Notifications\Notification;
use UVI\Notification\Contracts\NotificationChannelContract;
use UVI\Notification\Contracts\NotificationFactoryContract;
use UVI\Notification\Exceptions\ChannelUnimplementedException;

class NotificationFactory implements NotificationFactoryContract
{
    /**
     * @throws ChannelUnimplementedException
     */
    public function from(mixed $notification, NotificationChannelContract $channel): Notification
    {
        if (! $channel->canAccept($notification)) {
            throw new ChannelUnimplementedException;
        }

        return $channel->wrapNotification($notification);
    }

}
