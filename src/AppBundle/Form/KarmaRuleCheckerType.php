<?php

namespace AppBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class KarmaRuleCheckerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('threshold', 'integer', [
            'constraints' => [
                new NotBlank(),
                new Type(['type' => 'numeric']),
            ],
        ]);
    }
}
