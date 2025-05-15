Ce package a pour but de centraliser le processus de creation et envoie de notification.


Utilisation:

``` php
use UVI\Notification\Facades\Notification;

$notification = new class implements ToGoogleChat, ToZendesk {
    public function toGoogleChat(AnonymousNotifiable $notifiable): GoogleChatNotification
    {
        return new BaseGoogleChatNotification('title', 'content', 'space webhook url');
    }
}

Notification::send($notification, new GoogleChatChannel);
``` 