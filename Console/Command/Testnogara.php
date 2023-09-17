<?php

namespace Hibrido\RepositoryTest\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Hibrido\RepositoryTest\Model\ProductRepository;

class Testnogara extends Command
{
    private $searchCriteriaBuilder;
    private $productRepository;

    public function __construct(
        SearchCriteriaBuilder $searchCriteriaBuilder,
        ProductRepository $productRepository,
        $name = null
    ) {
        parent::__construct($name);
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->productRepository = $productRepository;
    }

    protected function configure()
    {
        $this->setName('hibrido:repository:test')
            ->setDescription('Testando conexão com o banco de dados, utilizando o padrão Repository');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('List of Product Names...');

        try {
            // Crie um critério de busca vazio para buscar todos os produtos
            $searchCriteria = $this->searchCriteriaBuilder->create();

            // Obtenha a lista de produtos usando o repositório personalizado
            $products = $this->productRepository->getList($searchCriteria)->getItems();

            // Itere sobre os produtos e exiba seus nomes
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
