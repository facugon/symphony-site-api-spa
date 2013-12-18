<?php

namespace IAR\ComprasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadModelData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $dataArray = $this->loadData();

        $conn = $this->container->get('database_connection');
        $conn->beginTransaction();

        $stmt = $conn->prepare('
            INSERT INTO `Model` (`id`,`name`,`brand_id`,`slug`,`synonym`,`short_name`,`pic_filename`,`disabled`) 
            VALUES (:ID, :NAME, :BRANDID, :SLUG, :SYNONYM, :SHORTNAME, :PICFILENAME, :DISABLED);
        ');

        foreach($dataArray as $brand_models) // all model for each brand
        {
            foreach($brand_models as $model)
            {
                $insert = array(
                    'ID'          => $model->id,
                    'NAME'        => $model->name,
                    'BRANDID'     => $model->brand_id,
                    'SLUG'        => $model->slug,
                    'SYNONYM'     => $model->synons,
                    'SHORTNAME'   => $model->short_name,
                    'PICFILENAME' => '',
                    'DISABLED'    => 0,
                );
                $stmt->execute($insert);
            }
        }

        $conn->commit();
    }

    private function loadData()
    {
        return json_decode(include 'data/models.json.php');
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}


