<?php

declare(strict_types=1);

namespace DivanteLtd\ObjectFieldsPermissions;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\Traits\PackageVersionTrait;

class ObjectFieldsPermissionsBundle extends AbstractPimcoreBundle
{
    use PackageVersionTrait;

    public function getJsPaths(): array
    {
        return [
            '/bundles/objectfieldspermissions/js/pimcore/startup.js',
        ];
    }

    protected function getComposerPackageName(): string
    {
        return 'divante-ltd/pimcore-object-fields-permissions';
    }
}
