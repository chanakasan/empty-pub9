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
            $tmp = $this->_serialize($result);
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
        /**
         * @var $result \Dream89\MainBundle\Document\FavoriteItem
         */
        $result = $this->get('doctrine_phpcr')->getManager()
            ->find('Dream89\MainBundle\Document\FavoriteItem', $this->basePath.$favoriteItem);

        $this->_checkResult($result, $favoriteItem);
        $data = $this->_serialize($result);
        return $this->render('Dream89MainBundle:Rest:json.html.twig', array('data' => $data));
    }

    /**
     * Delete a record
     * POST | DELETE
     */
    function deleteAction($favoriteItem)
    {
        $dm = $this->get('doctrine_phpcr')->getManager();
        /**
         * @var $result \Dream89\MainBundle\Document\FavoriteItem
         */
        $result = $dm->find('Dream89\MainBundle\Document\FavoriteItem', $this->basePath.$favoriteItem);

        $this->_checkResult($result, $favoriteItem);
        $dm->remove($result);
        $dm->flush();
        $data = array(
            'message' => sprintf("Item '%s' removed.", $result->getName()),
            'success' => true,
        );
        echo json_encode($data);
        exit;
    }

    /**
     * Delete a record
     * POST | DELETE
     */
    function updateAction($favoriteItem)
    {
        $dm = $this->get('doctrine_phpcr')->getManager();

        /**
         * @var $result \Dream89\MainBundle\Document\FavoriteItem
         */
        $result = $dm->find('Dream89\MainBundle\Document\FavoriteItem', $this->basePath.$favoriteItem);

        $this->_checkResult($result, $favoriteItem);
        $result = $this->_updateResult($result);

        $dm->persist($result);
        $dm->flush();

        $data = array(
            'message' => sprintf("Item '%s' removed.", $result->getName()),
            'success' => true,
        );
        echo json_encode($data);
        exit;
    }

    private function _checkResult($result, $favoriteItem)
    {
        try {
            if($result === null)
            {
                throw new Exception(sprintf("Item '%s' not found.", $favoriteItem));
            }
        } catch(Exception $e) {
            $data = array(
                'error' => $e->getMessage(),
                'success' => false,
            );
            echo json_encode($data);
            exit;
        }
    }

    private function _serialize($obj)
    {
        /**
         * @var $obj \Dream89\MainBundle\Document\FavoriteItem
         */
        return array(
            'id' => $obj->getId(),
            'name' => $obj->getName(),
            'url' => $obj->getUrl(),
            'tags' => $obj->getTags(),
        );
    }

    private function _updateResult($result)
    {
        /**
         * @var $result \Dream89\MainBundle\Document\FavoriteItem
         */
        $name = $this->getRequest()->get('name');
        $url = $this->getRequest()->get('url');
        $tags = $this->getRequest()->get('tags');

        if($url != null)
        {
            $result->setUrl($url);
        }
        $result->setName($name);
        $result->setTags($tags);

        return $result;
    }

} 