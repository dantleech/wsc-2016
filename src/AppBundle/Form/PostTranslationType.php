<?php

namespace AppBundle\Form;

use AppBundle\Entity\PostTranslation;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\FormBuilderInterface;

class PostTranslationType extends AbstractResourceType
{
    public function __construct()
    {
        parent::__construct(PostTranslation::class);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text');
        $builder->add('body', 'textarea');
    }
}
