<?php

namespace AppBundle\Promotion;

use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Promotion\Checker\RuleCheckerInterface;
use Sylius\Component\Promotion\Exception\UnsupportedTypeException;
use Sylius\Component\Promotion\Model\PromotionSubjectInterface;
use AppBundle\Form\KarmaRuleCheckerType;

class KarmaRuleChecker implements RuleCheckerInterface
{
    /**
     * {@inheritdoc}
     */
    public function isEligible(PromotionSubjectInterface $subject, array $configuration)
    {
        if (!$subject instanceof OrderInterface) {
            throw new UnsupportedTypeException($subject, OrderInterface::class);
        }

        if (null === $customer = $subject->getCustomer()) {
            return false;
        }

        if ($customer->getKarma() < $configuration['threshold']) {
            return false;
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigurationFormType()
    {
        return KarmaRuleCheckerType::class;
    }
}

