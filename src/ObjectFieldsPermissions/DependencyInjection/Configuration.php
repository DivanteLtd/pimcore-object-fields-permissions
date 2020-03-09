<?php

declare(strict_types=1);

namespace DivanteLtd\ObjectFieldsPermissions\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('object_fields_permissions');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
            ->arrayNode('objects')
            ->useAttributeAsKey('class')
            ->arrayPrototype()
            ->arrayPrototype()
            ->children()
            ->arrayNode('roles')
            ->scalarPrototype()->end()
            ->end()
            ->arrayNode('conditions')
            ->arrayPrototype()
            ->scalarPrototype()
            ->end()
            ->end()
            ->end()
            ->arrayNode('properties')
            ->arrayPrototype()
            ->arrayPrototype()
            ->scalarPrototype()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
