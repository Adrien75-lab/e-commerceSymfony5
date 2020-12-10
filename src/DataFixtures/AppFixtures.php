<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $adminUser = new User();
        $adminUser->setFirstName('Adrien')
            ->setLastName('Christophe')
            ->setEmail('adrichristophe@gmail.com')
            ->setPassword('M0tdep@sse')
            ->setHash($this->encoder->encodePassword($adminUser, 'password'));
        $manager->persist($adminUser);
        $manager->flush();
    }
}