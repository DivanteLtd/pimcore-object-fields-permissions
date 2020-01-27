<?php

declare(strict_types=1);

namespace DivanteLtd\ObjectFieldsPermissions\Service;

use Pimcore\Model\DataObject\Concrete;

final class ObjectFieldsPermissions
{
    /** @var array */
    private $objectFieldsData;

    public function __construct(array $objectFieldsData)
    {
        $this->objectFieldsData = $objectFieldsData;
    }

    public function getFieldPropertities(Concrete $object): array
    {
        $data = [];

        foreach ($this->objectFieldsData as $class => $objectFieldsDatum) {
            //TODO compare class names
            if ($class === $object->getClassName()) {
                $data = $this->getDataForObject($object, $objectFieldsDatum);
            }
        }

        return $data;
    }

    private function getDataForObject(AbstractObject $object, array $objectsData): array
    {
        $data = [];

        foreach ($objectsData as $objectData) {
            //TODO get role
            if (in_array('role', $objectData['roles'])) {
                $fit = true;

                foreach ($objectData['conditions'] as $field => $value) {
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
