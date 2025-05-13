<?php

namespace UVI\Notification\Tests\Google;

use UVI\Notification\Google\GoogleChatNotification;
use UVI\Notification\Google\ToGoogleChat;

describe( ToGoogleChat::class, function () {
    $notification = new class implements ToGoogleChat {

        public function toGoogleChat(): GoogleChatNotification
        {
            return new class implements GoogleChatNotification {

            };
        }
    };

    test('toGoogleChat should return a GoogleChatNotification instance', function (ToGoogleChat $notification) {
        expect($notification->toGoogleChat())->toBeInstanceOf(GoogleChatNotification::class);
    })->with([$notification]);

});

