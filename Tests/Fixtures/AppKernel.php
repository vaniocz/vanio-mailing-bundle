<?php

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

/**
 * Application kernel for tests.
 */
class AppKernel extends Kernel
{
    use MicroKernelTrait;

    /**
     * {@inheritdoc}
     */
    public function registerBundles(): array
    {
        return [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle,
            new Symfony\Bundle\TwigBundle\TwigBundle,
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle,
            new Vanio\MailingBundle\VanioMailingBundle,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getRootDir(): string
    {
        return __DIR__;
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheDir(): string
    {
        return sprintf('%s/../../var/cache/%s', __DIR__, $this->getEnvironment());
    }

    /**
     * {@inheritdoc}
     */
    public function getLogDir(): string
    {
        return __DIR__ . '/../../var/logs';
    }

    /**
     * {@inheritdoc}
     */
    protected function configureRoutes(RouteCollectionBuilder $routes)
    {}

    /**
     * {@inheritdoc}
     */
    protected function configureContainer(ContainerBuilder $container, LoaderInterface $loader)
    {
        $container->loadFromExtension('framework', [
            'secret' => 'secret',
            'templating' => ['engines' => 'twig'],
            'assets' => ['enabled' => false],
        ]);
    }
}
