<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use AppBundle\Entity\PostTranslation;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;

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
