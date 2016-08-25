<?php

namespace AppBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class KarmaMultiplierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('multiplier', 'number', [
            'precision' => 2,
            'constraints' => [
                new NotBlank(),
                new Type(['type' => 'numeric']),
            ],
        ]);
    }
}
