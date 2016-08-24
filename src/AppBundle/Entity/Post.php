<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORm\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $body;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $publishedAt;

    public function getTitle() 
    {
        return $this->title;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getBody() 
    {
        return $this->body;
    }
    
    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getPublishedAt() 
    {
        return $this->publishedAt;
    }
    
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    public function getId() 
    {
        return $this->id;
    }
}
