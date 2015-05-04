<?php

namespace Elleslande\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

include('functionsPhpBB.php');

class DefaultController extends Controller
{
    public function indexAction()
    {
	$posts = $this->getPosts(3);
        return $this->render('ElleslandeBlogBundle:Default:index.html.twig', array('posts'=>$posts));
    }
    public function presentationAction()
    {
	return $this->render('ElleslandeBlogBundle:Default:presentation.html.twig');
    }
    public function installAction()
    {
        return $this->render('ElleslandeBlogBundle:Default:index.html.twig', array());
    }
    public function getPosts($id)
    {
	$phpbb_root_path = "/var/www/phpBB3/";
	$conn = $this->get('database_connection');
	$posts = $conn->fetchAll('SELECT * FROM phpbb_posts LEFT JOIN phpbb_users ON phpbb_posts.poster_id = phpbb_users.user_id WHERE forum_id = '.$id.' ORDER BY post_time DESC LIMIT 10 ' );
	foreach ($posts as $key=>$item)
	{
		$posts[$key]["post_text"]=BBcodeToHtml($item["post_text"]);
		
	}
	return $posts;

    }
}
