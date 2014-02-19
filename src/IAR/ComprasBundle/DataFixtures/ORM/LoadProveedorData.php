<?php

namespace IAR\ComprasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Doctrine\Common\Persistence\ObjectManager;

class LoadProveedorData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /*
        $stmt = $this->loadStmt();

        $manager
            ->getConnection()
            ->prepare($stmt)
            ->execute();
         */
        echo "doing nothing by now...\n";
    }

    private function loadStmt()
    {
        return include 'data/proveedor.sql.php';
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 9; // High numbre, to load after 3) : \IAR\CommonsBundle\Entity\Provincia and 4) : \IAR\CommonsBundle\Entity\PLocalidad
    }
}
