<?php

namespace FroshCleaner\Components\Processor;

class BasketProcessor extends AbstractProcessor
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Cleanup old basket entries';
    }

    /**
     * @return int Affected rows
     * @throws \Doctrine\DBAL\DBALException
     */
    public function execute()
    {
        return $this->connection->executeUpdate('DELETE FROM s_order_basket WHERE datum < DATE_SUB(NOW(), INTERVAL 1 YEAR)');
    }
}