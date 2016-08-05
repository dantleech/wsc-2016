<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\Post;

class PostsController
{
    private $templating;
    private $manager;

    public function __construct(
        EngineInterface $templating,
        EntityManagerInterface $manager
    )
    {
        $this->templating = $templating;
        $this->manager = $manager;
    }

    public function indexAction(Request $request)
    {
        $posts = $this->manager->getRepository(Post::class)->findAll();

        return new Response($this->templating->render(
            '@App/posts/index.html.twig',
            [
                'posts' => $posts
            ]
        ));
    }
}
