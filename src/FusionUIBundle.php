<?php

namespace DahRomy\FusionUI;

use DahRomy\FusionUI\DependencyInjection\FusionUIExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class FusionUIBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    protected function createContainerExtension(): ?ExtensionInterface
    {
        return new FusionUIExtension();
    }
}