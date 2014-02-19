<?php

namespace IAR\CommonsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Doctrine\Common\Persistence\ObjectManager;

class LoadProvinciaData  extends AbstractFixture implements OrderedFixtureInterface
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
        return include 'data/provincias.sql.php';
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3; // First load Provincias
    }
}
