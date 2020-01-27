<?php

declare(strict_types=1);

namespace DivanteLtd\ObjectFieldsPermissions\EventListener;

use DivanteLtd\ObjectFieldsPermissions\Service\ObjectFieldsPermissions;
use Symfony\Component\EventDispatcher\GenericEvent;

final class ObjectPreGetDataListener
{
    /** @var ObjectFieldsPermissions */
    private $objectFieldsPermissions;

    public function __construct(ObjectFieldsPermissions $objectFieldsPermissions)
    {
        $this->objectFieldsPermissions = $objectFieldsPermissions;
    }

    /**
     * @param GenericEvent $event
     */
    public function onPreSendData(GenericEvent $event): void
    {
        $object = $event->getArgument('object');
        $data = $event->getArgument('data');

        $data['fields_properties'] = $this->objectFieldsPermissions->getFieldPropertities($object);

        $event->setArgument('data', $data);
    }
}
