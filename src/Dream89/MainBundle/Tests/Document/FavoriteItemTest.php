<?php
namespace Dream89\MainBundle\Tests\Document;

use Dream89\MainBundle\Document\FavoriteItem;

class FavoriteItemTest extends \PHPUnit_Framework_TestCase {

    /**
     * @test
     */
    function it_can_be_initialized()
    {
        $fav_item = new FavoriteItem();
        $this->assertInstanceOf('Dream89\MainBundle\Document\FavoriteItem', $fav_item);

        return $fav_item;
    }

    /**
     * @test
     * @depends it_can_be_initialized
     */
    function it_has_no_id_by_default(FavoriteItem $fav_item)
    {
        $this->assertNull($fav_item->getId());
    }
} 