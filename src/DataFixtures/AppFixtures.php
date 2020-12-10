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
        
        $adminUser = new User();
        $adminUser->setFirstName('Adrien')
            ->setLastName('Christophe')
            ->setEmail('adrichristophe@gmail.com')
            ->setPassword('M0tdep@sse')
            ->setRole('ROLE_ADMIN');
        $manager->persist($adminUser);
        
    }
}
$manager->flush();