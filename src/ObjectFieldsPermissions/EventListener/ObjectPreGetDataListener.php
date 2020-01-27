<?php

declare(strict_types=1);

namespace DivanteLtd\ObjectFieldsPermissions\EventListener;

class ObjectPreGetDataListener
{
    /** @var ObjectFields */
    private $objectFieldsPermissions;

    /**
     * ProductPreGetDataListener constructor.
     *
     * @param ProductFields $productFields
     */
    public function __construct(ProductFields $productFields)
    {
        $this->productFields = $productFields;
    }

    /**
     * @param GenericEvent $event
     */
    public function onPreSendData(GenericEvent $event): void
    {
        $object = $event->getArgument('object');
        if ($object instanceof Product) {
            $data = $event->getArgument('data');

            $data['fields_properties'] = $this->productFields->getFieldPropertities($object);

            $event->setArgument('data', $data);
        }
    }
}
