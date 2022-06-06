<?php

namespace App\Command;

use App\Service\AddCurrencyDetailService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class TestCommand extends Command
{
    protected static $defaultName = 'app:start';
    protected static $defaultDescription = 'Добавление криптовалют с деталями';

    private $addCurrencyDetailService;

    public function __construct(AddCurrencyDetailService $addCurrencyDetailService)
    {
        $this->addCurrencyDetailService = $addCurrencyDetailService;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setHelp('Для добавление криптовалют с деталями');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $this->addCurrencyDetailService->addCurrencyDetail();

        $io->success('Созданы криптовалюты с деталями из биржы');

        return Command::SUCCESS;
    }
}
