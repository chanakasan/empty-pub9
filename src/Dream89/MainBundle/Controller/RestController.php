<?php
namespace Dream89\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;

class RestController extends Controller {

    protected $basePath ='/cms/content/favorites/';
    /**
     * Get all items
     * GET
     * @return array
     *
     */
    function getFavoritesAction()
    {
        $results = $this->get('doctrine_phpcr')->getManager()
            ->getRepository('Dream89\MainBundle\Document\FavoriteItem')
            ->findAll();

        $data = array();

        foreach($results as $result)
        {
            /**
             * @var $obj \Dream89\MainBundle\Document\FavoriteItem
             */
            $obj = $result;
            $tmp = array(
              'id' => $obj->getId(),
              'name' => $obj->getName(),
              'url' => $obj->getUrl(),
              'tags' => $obj->getTags(),
            );
            $data[] = $tmp;
        }
        return $this->render('Dream89MainBundle:Rest:json.html.twig', array('data' => $data));
    }

    /**
     * Get one item
     * GET
     * @return array
     */
    function getFavoriteAction($favoriteItem)
    {
        $result = $this->get('doctrine_phpcr')->getManager()
            ->find('Dream89\MainBundle\Document\FavoriteItem', $this->basePath.$favoriteItem);

        /**
         * @var $obj \Dream89\MainBundle\Document\FavoriteItem
         */
        $obj = $result;
        $data = array(
            'id' => $obj->getId(),
            'name' => $obj->getName(),
            'url' => $obj->getUrl(),
            'tags' => $obj->getTags(),
        );

        try {
            if($data['name'] != $favoriteItem)
            {
                throw new Exception('Invalid name in returned data: '. $data['name']);
            }
        } catch(Exception $e)
        {
            $data = array(
                'error' => $e->getMessage(),
                'success' => false,
            );
            return json_encode($data);
        }
        return $this->render('Dream89MainBundle:Rest:json.html.twig', array('data' => $data));
    }
} 