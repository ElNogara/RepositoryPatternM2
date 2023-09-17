<?php

namespace Hibrido\RepositoryTest\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;

interface NgProductRepositoryInterface
{
    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface;
}
