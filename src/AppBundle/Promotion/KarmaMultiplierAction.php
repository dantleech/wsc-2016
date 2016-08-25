<?php

namespace AppBundle\Promotion;

use Sylius\Component\Promotion\Action\PromotionActionInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Form\KarmaMultiplierType;
use Sylius\Component\Promotion\Model\PromotionSubjectInterface;
use Sylius\Component\Promotion\Model\PromotionInterface;

class KarmaMultiplierAction implements PromotionActionInterface
{
    /**
     * Applies the promotion to its subject.
     *
     * @param PromotionSubjectInterface $subject
     * @param array                     $configuration
     * @param PromotionInterface        $promotion
     *
     * @return mixed
     */
    public function execute(PromotionSubjectInterface $subject, array $configuration, PromotionInterface $promotion)
    {
        // validate subject instanceof Sylius\Component\Core\Model\Order
        $customer = $subject->getCustomer();
        // validate that customer is not null ...

        $customer->setKarma(
            $customer->getKarma() * $configuration['multiplier']
        );
    }

    /**
     * Revert the promotion from its subject
     *
     * @param PromotionSubjectInterface $subject
     * @param array                     $configuration
     * @param PromotionInterface        $promotion
     *
     * @return mixed
     */
    public function revert(PromotionSubjectInterface $subject, array $configuration, PromotionInterface $promotion)
    {
        // validate subject instanceof Sylius\Component\Core\Model\Order
        $customer = $subject->getCustomer();
        // validate that customer is not null ...

        $customer->setKarma(
            $customer->getKarma() / $configuration['multiplier']
        );
    }

    /**
     * Returns the form name related to this action.
     *
     * @return string
     */
    public function getConfigurationFormType()
    {
        return KarmaMultiplierType::class;
    }
}
