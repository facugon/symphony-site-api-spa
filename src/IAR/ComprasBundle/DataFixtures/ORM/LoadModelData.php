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

    private $_sqlQuery = '
            INSERT INTO `Model` (`id`,`name`,`brand_id`,`slug`,`synonym`,`short_name`,`pic_filename`,`disabled`) 
            VALUES (:ID, :NAME, :BRANDID, :SLUG, :SYNONYM, :SHORTNAME, :PICFILENAME, :DISABLED);
        ';

    private function importJSONData()
    {
        $dataArray = $this->loadJSONData();

        $conn = $this->container->get('database_connection');
        $conn->beginTransaction();

        $stmt = $conn->prepare( $this->_sqlQuery );

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
                    'PICFILENAME' => $model->pics,
                    'DISABLED'    => 0,
                );
                $stmt->execute($insert);
            }
        }

        $conn->commit();
    }

    private function importXMLData()
    {
        $dataArray = $this->loadXMLData();

        $conn = $this->container->get('database_connection');
        $conn->beginTransaction();

        $stmt = $conn->prepare( $this->_sqlQuery );

        foreach( $dataArray->Brand as $objBrand ) // for each brand
        {
            $id = (int) $objBrand->attributes()->id;

            echo $id . "\n";

            foreach( $objBrand->ArrayOfDictionary->Dictionary as $objModel ) // all of it's models
            {
                $insert = array(
                    'ID'          => trim($objModel->Value),
                    'NAME'        => trim($objModel->Text),
                    'BRANDID'     => $id,
                    'SLUG'        => preg_replace('/\s+/','_',trim($objModel->Text)),
                    'SYNONYM'     => '',
                    'SHORTNAME'   => '',
                    'PICFILENAME' => 'empty.png',
                    'DISABLED'    => 0,
                );
                $stmt->execute($insert);
            }
        }

        $conn->commit();
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->importXMLData();
    }

    private function loadJSONData()
    {
        return json_decode(include 'data/models.json.php');
    }

    private function loadXMLData()
    {
        return simplexml_load_file( dirname(__FILE__) . '/data/models.xml');
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // After Brands
    }
}


