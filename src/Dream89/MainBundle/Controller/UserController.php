<?php
namespace Dream89\MainBundle\Controller;

use Dream89\MainBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class UserController extends Controller {

    /**
     * @return array
     * @View()
     */
    function getUsersAction()
    {
        $users = $this->getDoctrine()->getRepository('Dream89MainBundle:User')
            ->findAll();
        return array('users' => $users );
    }

    /**
     * @param User $user
     * @return array
     * @View()
     * @ParamConverter("user", class="Dream89MainBundle:User")
     */
    function getUserAction(User $user)
    {
        return array('user' => $user );
    }
} 