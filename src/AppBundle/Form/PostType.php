<?php

namespace AppBundle\Form;

use AppBundle\Entity\Post;
use Symfony\Component\Form\FormBuilderInterface;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;

class PostType extends AbstractResourceType
{
    public function __construct()
    {
        parent::__construct(Post::class);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('categories', 'sylius_taxon_choice', [
            'root' => 'Post Categories',
            'multiple' => true,
        ]);
        $builder->add('publishedAt', 'datetime');
        $builder->add('translations', 'sylius_translations', [
            'type' => PostTranslationType::class
        ]);
    }
}
