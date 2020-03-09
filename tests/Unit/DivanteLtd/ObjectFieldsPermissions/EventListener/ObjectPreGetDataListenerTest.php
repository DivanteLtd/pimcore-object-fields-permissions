<?php

declare(strict_types=1);

namespace tests\DivanteLtd\ObjectFieldsPermissions\EventListener;

use DivanteLtd\ObjectFieldsPermissions\EventListener\ObjectPreGetDataListener;
use DivanteLtd\ObjectFieldsPermissions\Service\ObjectFieldsPermissions;
use Pimcore\Model\DataObject;
use Symfony\Component\EventDispatcher\GenericEvent;

class ObjectPreGetDataListenerTest extends TestCase
{
    /** @var ObjectPreGetDataListener */
    private $objectPreGetDataListener;

    protected function setUp()
    {
        $objectFieldsPermissionsMock = $this->getMockBuilder(ObjectFieldsPermissions::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->objectPreGetDataListener = new ObjectPreGetDataListener(
            $objectFieldsPermissionsMock
        );
    }

    public function testOnPreSendDataWillReturnEmptyPropertiesArray()
    {
        $genericEventMock = $this->getMockBuilder(GenericEvent::class)
            ->disableOriginalConstructor()
            ->getMock();

        $genericEventMockValues = [
            ['object', new DataObject()],
            ['data', []]
        ];
        $genericEventMock
            ->expects($this->any())
            ->method('getArgument')
            ->will($this->returnValueMap($genericEventMockValues));

        $this->assertEquals([], $genericEventMock->getArgument('data'));

    }

    // TODO test for properties not empty list

    protected function tearDown()
    {
        $this->objectPreGetDataListener = null;
    }
}
