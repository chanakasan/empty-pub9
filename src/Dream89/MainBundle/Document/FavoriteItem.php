<?php
namespace Dream89\MainBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
/**
 * Class FavoriteItem
 * @package Dream89\MainBundle\Document
 * @PHPCR\Document(repositoryClass="Dream89\MainBundle\Document\FavoriteItemRepository")
 */
class FavoriteItem
{
    /**
     * @PHPCR\Id(strategy="repository")
     */
    protected $id;

    /**
     * @PHPCR\NodeName()
     */
    protected $name;

    /**
     * @PHPCR\String()
     */
    protected $url;

    /**
     * @PHPCR\String(multivalue=true, nullable=true)
     */
    protected $tags;

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }
} 