<?php
namespace Dream89\MainBundle\Document;

use Doctrine\ODM\PHPCR\DocumentRepository;
use Doctrine\ODM\PHPCR\Id\RepositoryIdInterface;
use Dream89\MainBundle\Document\FavoriteItem;

class FavoriteItemRepository extends DocumentRepository implements RepositoryIdInterface
{
    protected static $basePath = '/cms/content/favorites/';

    /**
     * Generate a document id
     * @param FavoriteItem
     */
    public function generateId($fav_item, $parent = null)
    {
        return self::$basePath . $fav_item->getName();
    }
}