<?php

namespace UVI\Notification\Tests;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification as NotificationFacade;
use UVI\Notification\Contracts\UviNotificationDispatcherContract;
use UVI\Notification\Exceptions\ChannelUnimplementedException;
use UVI\Notification\Exceptions\DispatchingWithoutNotificationException;
use UVI\Notification\Google\GoogleChatChannel;
use UVI\Notification\Tests\Fixtures\TestUviNotification;
use UVI\Notification\UviNotificationDispatcher;

describe(UviNotificationDispatcher::class, function () {

    it('can attach a notification', function () {

        $dispatcher = app(UviNotificationDispatcherContract::class);
        $notification = new TestUviNotification;

        $dispatcher->send($notification);

        expect($dispatcher->getBaseNotification())->toBe($notification);
    });

    test('should not be able to send a notification to an unimplemented channel', function () {
        app(UviNotificationDispatcherContract::class)->send(new class {})->to(new GoogleChatChannel);
    })->throws(ChannelUnimplementedException::class);

    test('should not be able to choose channel without notification', function () {
        app(UviNotificationDispatcherContract::class)->to(new GoogleChatChannel);
    })->throws(DispatchingWithoutNotificationException::class);

    test('should be able to choose channel with notification matching constrains', function () {
        app(UviNotificationDispatcherContract::class)->send(new TestUviNotification)->to(new GoogleChatChannel);
    })->throwsNoExceptions();

    test('sending a notification to a channel attach a laravel notification to dispatcher', function () {
        $dispatcher = app(UviNotificationDispatcherContract::class)->send(new TestUviNotification)->to(new GoogleChatChannel);

        expect($dispatcher->getRealNotification())->toBeInstanceOf(Notification::class);
    });

    test('notification is sent', function () {
        app(UviNotificationDispatcherContract::class)->send(new TestUviNotification)->to(new GoogleChatChannel);
        NotificationFacade::assertCount(1);
    });
});
