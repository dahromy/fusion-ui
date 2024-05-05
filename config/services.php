<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

use DahRomy\FusionUI\Command\InitCommand;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return static function (ContainerConfigurator $configurator): void {
    $services = $configurator->services();

    $services->set('dahromy.fusion_ui.command.init', InitCommand::class)
        ->args([
            service('tailwind.builder')
        ])
        ->tag('console.command');
};