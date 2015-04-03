<?php

namespace Elleslande\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
	$conn = $this->get('database_connection');
	$posts = $conn->fetchAll('SELECT * FROM phpbb_posts LEFT JOIN phpbb_users ON phpbb_posts.poster_id = phpbb_users.user_id WHERE forum_id = 3' );
        return $this->render('ElleslandeBlogBundle:Default:index.html.twig', array('name' => $name, 'posts'=>$posts));
    }
    public function installAction($name)
    {
        return $this->render('ElleslandeBlogBundle:Default:index.html.twig', array('name' => $name));
    }
}
