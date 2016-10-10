<?php
namespace Vanio\MailingBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Loads this bundle configuration.
 */
class VanioMailingExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        (new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config')))->load('services.xml');
    }
}
