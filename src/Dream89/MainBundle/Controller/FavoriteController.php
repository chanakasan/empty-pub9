<?php
namespace Dream89\MainBundle\Controller;

use Dream89\MainBundle\Document\FavoriteItem;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View,
    FOS\RestBundle\Controller\Annotations\RouteResource;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class FavoriteController extends Controller {

    /**
     * @return array
     * @View()
     */
    function getFavoritesAction()
    {
        $favorites = $this->get('doctrine_phpcr')->getManager()
            ->getRepository('Dream89\MainBundle\Document\FavoriteItem')
            ->findAll();
        return array('favorites' => $favorites );
    }

    /**
     * @return array
     * @View()
     */
    function getFavoriteAction(FavoriteItem $favoriteItem)
    {
        $data = $this->get('doctrine_phpcr')->getManager()
            ->getRepository('Dream89\MainBundle\Document\FavoriteItem')
            ->find('Dream89\MainBundle\Document\FavoriteItem', $favoriteItem);
        return array('favorites' => $data );
    }
}
