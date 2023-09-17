<?php

namespace Hibrido\RepositoryPa\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;

interface HbRepositoryInterface
{
    public function getAllProducts(SearchCriteriaInterface $searchCriteria): SearchResultsInterface;
    public function getAllAdminUsers(): SearchResultsInterface;
}
