<?php

namespace IAR\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use IAR\MainBundle\Entity\User;

class LoadUsersData implements FixtureInterface, ContainerAwareInterface
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
        $userManager = $this->container->get('fos_user.user_manager');

        $data = $this->getData();

        foreach($data as $prop)
        {
            $user = $userManager->createUser();
            $user->setUsername($prop->username);
            $user->setEmail($prop->email);
            $user->setPlainPassword($prop->password);
            $userManager->updatePassword($user);
            $userManager->updateCanonicalFields($user);
            $user->addRole($prop->role);
            $user->setSuperAdmin(true);
            $user->setEnabled(true);


            $manager->persist($user);
            $manager->flush();
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }

    /**
     * Get data to import
     *
     * return array
     */
    public function getData()
    {
        return array(
            (object) array(
                'username' => 'superadmin',
                'password' => '123',
                'email' => 'admin@iar.com.ar',
                'role' => 'ROLE_ADMIN',
                'super_admin' => true
            )
        );
    }
}
