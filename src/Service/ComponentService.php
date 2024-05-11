<?php

namespace DahRomy\FusionUI\Service;

use Symfony\Component\Process\Process;

class ComponentService
{
    private array $components = [];

    public function __construct()
    {
        $this->components = json_decode(file_get_contents(__DIR__ . '/data/components.json'), true);
    }

    public function add(string $componentName): void {

        if (!array_filter($this->components, fn($component) => $component['name'] === $componentName)) {
            throw new \InvalidArgumentException("Component $componentName not found");
        }

        $component = array_filter($this->components, fn($component) => $component['name'] === $componentName)[0];

        $this->handleDependencies($component);

        foreach ($component['files'] as $file) {
            $this->addFile($file);
        }
    }

    private function handleDependencies(array $component): void
    {
        $dependencyTypes = ['registryDependencies', 'dependencies', 'iconDependencies'];

        foreach ($dependencyTypes as $dependencyType) {
            if (array_key_exists($dependencyType, $component)) {
                foreach ($component[$dependencyType] as $dependency) {
                    if ($dependencyType === 'dependencies') {
                        $this->addDependency($dependency);
                    } elseif ($dependencyType === 'iconDependencies') {
                        $this->addIcon($dependency);
                    } else {
                        $this->add($dependency);
                    }
                }
            }
        }
    }

    private function addDependency(string $dependency): void
    {
        $process = new Process(['php', 'bin/console', 'importmap:require', $dependency]);
        $process->run();
    }

    private function addIcon(string $dependency): void
    {
        $process = new Process(['php', 'bin/console', 'ux:icons:import', $dependency]);
        $process->run();
    }

    private function addFile(array $file): void
    {
        $fileName = $file['name'];
        $fileDir = $file['dir'];
        $fileContent = $file['content'];

        if (!is_dir($fileDir)) {
            mkdir($fileDir, 0777, true);
        }

        if (file_exists($fileDir . '/' . $fileName)) {
            return;
        }

        file_put_contents($fileDir . '/' . $fileName, $fileContent);
    }
}