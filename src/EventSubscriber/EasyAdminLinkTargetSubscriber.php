<?php

namespace App\EventSubscriber;

use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminLinkTargetSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => 'onBeforeEntitySave',
            BeforeEntityUpdatedEvent::class => 'onBeforeEntitySave',
        ];
    }

    public function onBeforeEntitySave($event)
    {
        $entity = $event->getEntityInstance();
        if (method_exists($entity, 'getDescription') && method_exists($entity, 'setDescription')) {
            $description = $entity->getDescription();
            $description = $this->addTargetBlankToLinks($description);
            $entity->setDescription($description);
        }
    }

    private function addTargetBlankToLinks(string $description): string
    {
        return preg_replace_callback(
            '/<a(?![^>]*\btarget=)([^>]*)>/i',
            function ($matches) {
                return '<a' . $matches[1] . ' target="_blank">';
            },
            $description
        );
    }
}
