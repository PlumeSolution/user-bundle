<?php

namespace PSUserBundle;

use PlumeSolution\UserBundle\DependencyInjection\PSUserExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PSUserBundle extends Bundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new PSUserExtension();
    }
}
