<?php

namespace AppBundle\Controller;

class PostsController
{
    public function indexAction(Request $request)
    {
        return $this->twig->render(
            '@AppBundle/posts/index.html.twig'
        );
    }
}
