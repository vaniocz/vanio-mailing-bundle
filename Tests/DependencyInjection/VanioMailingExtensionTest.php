<?php
namespace Vanio\MailingBundle\Tests\DependencyInjection;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Vanio\EasyMailer\EasyMailer;

class VanioMailingExtensionTest extends KernelTestCase
{
    function test_mailer_configuration()
    {
        static::bootKernel();

        $this->assertInstanceOf(EasyMailer::class, static::$kernel->getContainer()->get('vanio_mailing.mailer'));
    }
}
