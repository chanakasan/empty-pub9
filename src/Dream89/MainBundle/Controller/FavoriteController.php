<?php
namespace Dream89\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class FavoriteController extends Controller {

    /**
     * @return array
     * @View()
     */
    function getFavorites()
    {
        $favorites = $this->get('doctrine_phpcr')->getManager()
            ->getRepository('Dream89\MainBundle\Document\FavoriteItem')
            ->findAll();
        return array('favorites' => $favorites );
    }
} 