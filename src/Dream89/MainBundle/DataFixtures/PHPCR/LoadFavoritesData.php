<?php
namespace Dream89\MainBundle\DataFixtures\PHPCR;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dream89\MainBundle\Document\FavoriteItem;

class LoadFavoritesData implements FixtureInterface {

    function load(ObjectManager $manager)
    {
        foreach(array('Free iOS Apps', 'Hacker News', '10 Useless things for you to read', 'Very Useless blog post') as $item)
        {
            $fav_item = new FavoriteItem();
            $fav_item->setName($item);
            $fav_item->setUrl('/page/dummy-url');

            $manager->persist($fav_item);
        }

        $manager->flush();
    }
} 