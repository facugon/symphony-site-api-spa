<?php

namespace IAR\ComprasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Doctrine\Common\Persistence\ObjectManager;

class LoadBrandData  extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $stmt = $this->loadStmt();

        $manager
            ->getConnection()
            ->prepare($stmt)
            ->execute();
    }

    private function loadStmt()
    {
        return include 'data/brands_autofoco.sql.php';
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // First of all. It has no dependencies
    }
}


