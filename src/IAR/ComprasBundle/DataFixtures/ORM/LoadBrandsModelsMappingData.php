<?php

namespace IAR\ComprasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Doctrine\Common\Persistence\ObjectManager;

class LoadBrandsModelsMappingData extends AbstractFixture implements OrderedFixtureInterface
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
        return include 'data/onetomany_brands_models.sql.php';
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}
