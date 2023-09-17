<?php

namespace Hibrido\RepositoryPa\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Hibrido\RepositoryPa\Model\HbRepository;

class ListUsers extends Command
{
    protected $hbRepository;

    public function __construct(
        HbRepository $hbRepository,
        $name = null
    ) {
        $this->hbRepository = $hbRepository;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName('hibrido:repository:users')
            ->setDescription('Através do Repository Pattern, estou listando os usuários admin');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Listando usuários admins...');
        $adminUsers = $this->hbRepository->getAllAdminUsers();

        try {
            foreach ($adminUsers->getItems() as $adminUser) {
                $output->writeln($adminUser->getName());
            }
            return \Magento\Framework\Console\Cli::RETURN_SUCCESS;
        } catch (\Throwable $e) {
            $output->writeln('Error: ' . $e->getMessage());
            return \Magento\Framework\Console\Cli::RETURN_FAILURE;
        }
    }
}
