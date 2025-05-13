On veut pouvoir envoyer des notifications dans des channels différents
exemple: Google chat, Mail, Slack, ...

Pour qu'une notification puisse être envoyée dans un channel, elle doit implementer l'interface de ce channel
exemple: ToGoogleChat, ToMail, ToSlack

Fichier config:
Google chat => on veut pouvoir configurer des channel

Propriétés: title, text

``` php
$notification = new class implements ToGoogleChat, ToZendesk {
    public string $title = 'Titre';
    public string $content = 'Contenue';

    public function toGoogleChat(): GoogleChatNotification {
        return new GoogleChatNotification()
            ->title($this->title)
            ->content($this->content)
    }
    
    public function ToZendesk(): ZendeskNotification {
        return new ZendeskNotification()
            ->title($this->title)
            ->content($this->content)
    }
    
}

Notifications::send($notification)->to(Chanels::GoogleChat)
Notifications::send($notification)->to(Chanels::Zendesk)
``` 