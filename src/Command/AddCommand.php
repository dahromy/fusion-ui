<?php

namespace DahRomy\FusionUI\Command;

use DahRomy\FusionUI\Service\ComponentService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'fusion-ui:add',
    description: 'Command to add components and dependencies to your project'
)]
class AddCommand extends Command
{
    public function __construct(private readonly ComponentService $componentService)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument(
            'names',
            InputArgument::IS_ARRAY,
            'The names of the components to add',
            null
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $names = $input->getArgument('names');

        if (empty($names)) {
            $io->error('You must provide at least one component name');

            return Command::FAILURE;
        }

        foreach ($names as $name) {
            $io->note("Adding $name...");

            $this->componentService->add($name);
        }

        return Command::SUCCESS;
    }
}