<?php

namespace Hibrido\RepositoryTest\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\LocalizedException;
use Hibrido\RepositoryTest\Api\NgProductRepositoryInterface;

class ProductRepository implements NgProductRepositoryInterface
{
    protected $productRepository;
    protected $searchCriteriaBuilder;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface
    {
        // Use o repositório de produtos para obter a lista de produtos
        try {
            return $this->productRepository->getList($searchCriteria);
        } catch (LocalizedException $e) {
            // Trate erros aqui, se necessário.
            throw new LocalizedException(__('Erro ao buscar a lista de produtos.'));
        }
    }
}
