<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    

    public function load(ObjectManager $manager)
    {
        $adminRole = new Role();
        $adminRole->setTitle('ROLE_ADMIN');
        $manager->persist($adminRole);
        $faker = Factory::create('fr_FR');
        $adminUser = new User();
        $adminUser->setFirstName('Adrien')
            ->setLastName('Christophe')
            ->setEmail('adrichristophe@gmail.com')
            ->setPassword('M0tdep@sse')
            >addUserRole($adminRole);
        $manager->persist($adminUser);
        $manager->flush();
    }
}