<?php

namespace Hibrido\RepositoryPa\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\LocalizedException;
use Hibrido\RepositoryPa\Api\HbRepositoryInterface;
use Magento\User\Model\ResourceModel\User\CollectionFactory as UserCollectionFactory;
use Magento\Framework\Api\SearchResultsFactory;

class HbRepository implements HbRepositoryInterface
{
    protected $productRepository;
    protected $searchCriteriaBuilder;
    protected $collectionFactory;
    protected $searchResultsFactory;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        UserCollectionFactory $collectionFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SearchResultsFactory $searchResultsFactory
    ) {
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    public function getAllProducts(SearchCriteriaInterface $searchCriteria): SearchResultsInterface
    {
        // Use o repositório de produtos para obter a lista de produtos
        try {
            return $this->productRepository->getList($searchCriteria);
        } catch (LocalizedException $e) {
            // Trate erros aqui, se necessário.
            throw new LocalizedException(__('Erro ao buscar a lista de produtos.'));
        }
    }

    public function getAllAdminUsers(): SearchResultsInterface
    {
        // Por exemplo, você pode usar a classe UserCollectionFactory para buscar usuários de admin:
        $adminUserCollection = $this->collectionFactory->create();

        // Faça a lógica para configurar e filtrar a coleção, se necessário.

        // Converta a coleção em um objeto SearchResults e retorne:
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setItems($adminUserCollection->getItems());
        $searchResults->setTotalCount($adminUserCollection->getSize());

        return $searchResults;
    }
}
