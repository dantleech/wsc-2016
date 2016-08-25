<?php

namespace AppBundle\Entity;

use Sylius\Component\Core\Model\Customer as BaseCustomer;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Customer extends BaseCustomer
{
    /**
     * @ORM\Column(type="integer")
     */
    private $karma = 0;

    public function getKarma() 
    {
        return $this->karma;
    }
    
    public function setKarma($karma)
    {
        $this->karma = $karma;
    }
    
}
