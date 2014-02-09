<?php
namespace Dream89\MainBundle\Controller;

use Symfony\Component\Config\Definition\Exception\Exception;

class RestController extends Controller {

    /**
     * Get all items
     * GET
     * @return array
     *
     */
    function getFavoritesAction()
    {
        $favorites = $this->get('doctrine_phpcr')->getManager()
            ->getRepository('Dream89\MainBundle\Document\FavoriteItem')
            ->findAll();
        return json_encode($favorites);
    }

    /**
     * Get one item
     * GET
     * @return array
     */
    function getFavoriteAction($favoriteItem)
    {
        $data = $this->get('doctrine_phpcr')->getManager()
            ->getRepository('Dream89\MainBundle\Document\FavoriteItem')
            ->find('Dream89\MainBundle\Document\FavoriteItem', '/cms/content/favorites/'.$favoriteItem);

        try {
            if($data->getName() != $favoriteItem)
            {
                throw new Exception('Invalid name in returned data: '. $data->getName());
            }
        } catch(Exception $e)
        {
            $data = array(
                'error' => $e->getMessage(),
                'success' => false,
            );
            return json_encode($data);
        }
        return json_encode($data);
    }
} 