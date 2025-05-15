<?php

namespace UVI\Notification\Tests;

use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Notification as NotificationFacade;
use UVI\Notification\Facades\Notification;
use UVI\Notification\Google\BaseGoogleChatNotification;
use UVI\Notification\Google\GoogleChatChannel;
use UVI\Notification\Google\GoogleChatNotification;
use UVI\Notification\Google\ToGoogleChat;
use UVI\Notification\Tests\Fixtures\DummyChannel\DummyChannel;
use UVI\Notification\Tests\Fixtures\DummyChannel\DummyNotification;
use UVI\Notification\Tests\Fixtures\DummyChannel\ToDummy;
use UVI\Notification\Tests\Fixtures\TestUviNotification;
use UVI\Notification\UviNotificationDispatcher;
use UVI\Notification\UviNotificationService;

describe(UviNotificationService::class, function () {
    test('sending a notification should return a '.UviNotificationDispatcher::class, function () {
        $sender = Notification::send(new TestUviNotification, new GoogleChatChannel);
        expect($sender)->toBeInstanceOf(UviNotificationDispatcher::class);
    });
    test('can send notification to multiple channels', function () {
        $notifications =
            new class implements ToGoogleChat, ToDummy {
                public function toDummy(AnonymousNotifiable $notifiable): DummyNotification
                {
                    return new class implements DummyNotification {
                        public function message(): string
                        {
                            return 'dummy-message';
                        }
                    };
                }

                public function toGoogleChat(AnonymousNotifiable $notifiable): GoogleChatNotification
                {
                    return new class(fake()->text(), fake()->realText(), config('uvi-notification.channels.google_chat.spaces.test', '')) extends BaseGoogleChatNotification {};
                }
            };

        Notification::send($notifications, [new GoogleChatChannel, new DummyChannel]);
        NotificationFacade::assertCount(2);

    });
});
