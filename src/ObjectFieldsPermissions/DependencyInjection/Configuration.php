<?php

declare(strict_types=1);

namespace DivanteLtd\ObjectFieldsPermissions\DependencyInjection;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        if (method_exists(TreeBuilder::class, 'getRootNode')) {
            $treeBuilder = new TreeBuilder('object_fields_permissions');
            $rootNode = $treeBuilder->getRootNode();
        } else {
            $treeBuilder = new TreeBuilder();
            $rootNode = $treeBuilder->root('object_fields_permissions');
        }
        $rootNode
            ->children()
            ->arrayNode('objects')
            ->useAttributeAsKey('class')
            ->prototype('scalar')
            ->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
