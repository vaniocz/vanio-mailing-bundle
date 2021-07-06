<?php
namespace Vanio\MailingBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('vanio_mailing');
        $treeBuilder->getRootNode()
            ->children()
                ->arrayNode('send_retry')
                    ->prototype('scalar')->end()
                    ->treatNullLike([])
                ->end()
            ->end();

        return $treeBuilder;
    }
}
