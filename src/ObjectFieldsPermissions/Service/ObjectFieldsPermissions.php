<?php

declare(strict_types=1);

namespace DivanteLtd\ObjectFieldsPermissions\Service;

use Pimcore\Model\DataObject\AbstractObject;

final class ObjectFieldsPermissions
{
    /** @var array */
    private $objectFieldsData;

    public function __construct(array $objectFieldsData)
    {
        $this->objectFieldsData = $objectFieldsData;
    }

    public function getFieldPropertities(AbstractObject $object): array
    {
        $data = [];

        foreach ($this->objectFieldsData as $class => $objectFieldsDatum) {
            //TODO compare class names
            if ($class === $object->getClass()) {
                $data = $this->getDataForObject($object, $objectFieldsDatum);
            }
        }

        return $data;
    }

    private function getDataForObject(AbstractObject $object, array $data): array
    {
        $data = [];

        foreach ($data as $datum) {
            //TODO get role
            if (in_array('role', $datum['roles'])) {
                $fit = true;

                foreach ($datum['conditions'] as $field => $value) {
                    if ($object->get($field) !== $value) {
                        $fit = false;
                    }
                }

                if ($fit) {
                    return $data['fields'];
                }
            }
        }

        return [];
    }
}
