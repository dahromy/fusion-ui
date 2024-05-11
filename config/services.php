<?php

use DahRomy\FusionUI\Command\AddCommand;
use DahRomy\FusionUI\Service\ComponentService;
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

    $services->set('dahromy.fusion_ui.service.component', ComponentService::class);

    $services->set('dahromy.fusion_ui.command.add', AddCommand::class)
        ->args([
            service('dahromy.fusion_ui.service.component')
        ])
        ->tag('console.command');
};