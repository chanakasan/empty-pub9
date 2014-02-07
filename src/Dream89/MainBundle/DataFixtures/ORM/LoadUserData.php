<?php
namespace Dream89\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dream89\MainBundle\Entity\User;

class LoadUserData implements FixtureInterface {

    function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('john');
        $user->setEmail('john@doe.com');
        $user->setPassword('pass123');
        $manager->persist($user);

        $user = new User();
        $user->setUsername('ben');
        $user->setEmail('ben@doe.com');
        $user->setPassword('pass123');
        $manager->persist($user);

        $manager->flush();
    }
} 