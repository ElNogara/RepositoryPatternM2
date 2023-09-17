<?php

namespace Hibrido\RepositoryPa\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Hibrido\RepositoryPa\Model\HbRepository;

class ListProducts extends Command
{
    private $searchCriteriaBuilder;
    private $hbRepository;

    public function __construct(
        SearchCriteriaBuilder $searchCriteriaBuilder,
        HbRepository $hbRepository,
        $name = null
    ) {
        parent::__construct($name);
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->hbRepository = $hbRepository;
    }

    protected function configure()
    {
        $this->setName('hibrido:repository:products')
            ->setDescription('Testando conexão com o banco de dados, utilizando o padrão Repository');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('List of Product Names...');

        try {
            $searchCriteria = $this->searchCriteriaBuilder->create();
            $products = $this->hbRepository->getAllProducts($searchCriteria)->getItems();

            foreach ($products as $product) {
                $output->writeln($product->getName());
            }
        } catch (\Exception $e) {
            $output->writeln('Error: ' . $e->getMessage());
            return \Magento\Framework\Console\Cli::RETURN_FAILURE;
        }

        return \Magento\Framework\Console\Cli::RETURN_SUCCESS;
    }
}
