<?php
namespace Dream89\MainBundle\DataFixtures\PHPCR;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dream89\MainBundle\Document\FavoriteItem;

class LoadFavoritesData implements FixtureInterface {

    function load(ObjectManager $manager)
    {
        $fav_item = new FavoriteItem();
        $fav_item->setName('Example page');
        $fav_item->setUrl('/page/example-page');

        $manager->persist($fav_item);
        $manager->flush();
    }
} 