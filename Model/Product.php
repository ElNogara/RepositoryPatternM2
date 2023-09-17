<?php

namespace Hibrido\RepositoryTest\Model;

use Magento\Framework\Model\AbstractModel;

class Product extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Hibrido\RepositoryTest\Model\ResourceModel\Product');
    }
}
