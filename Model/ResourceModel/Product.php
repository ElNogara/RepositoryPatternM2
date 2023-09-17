<?php

namespace Hibrido\RepositoryTest\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Product extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('seu_nome_da_tabela_no_banco', 'id_do_seu_modelo');
    }
}
