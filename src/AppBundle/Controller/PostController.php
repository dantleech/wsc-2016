<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Post;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    public function postsAction(Request $request)
    {
        $posts = $this->get('doctrine')->getManager()
            ->getRepository(Post::class)
            ->findAll();

        return $this->render(
            'AppBundle:Post:index.html.twig',
            [
                'posts' => $posts,
            ]
        );

    }
}
