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
        $config = $this->processConfiguration(new Configuration, $configs);
        $loader = new XmlFileLoader($container, new FileLocator(sprintf('%s/../Resources/config', __DIR__)));
        $loader->load('services.xml');
        $container->setParameter('vanio_mailing', $config);

        foreach ($config as $key => $value) {
            $container->setParameter("vanio_mailing.$key", $value);
        }
    }
}
