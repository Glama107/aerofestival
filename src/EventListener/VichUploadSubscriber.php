<?php

namespace App\EventListener;

use App\Service\ImageCompressorService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Vich\UploaderBundle\Event\Event;
use Vich\UploaderBundle\Event\Events;

class VichUploadSubscriber implements EventSubscriberInterface
{
    public function __construct(private readonly ImageCompressorService $imageCompressor)
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::POST_UPLOAD => 'onPostUpload',
        ];
    }

    public function onPostUpload(Event $event): void
    {
        $mapping = $event->getMapping();
        $fileName = $mapping->getFileName($event->getObject());

        if (null === $fileName) {
            return;
        }

        $filePath = rtrim($mapping->getUploadDestination(), '/') . '/' . $fileName;
        $this->imageCompressor->compress($filePath);
    }
}
