<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

class Address{
    //TODO
    #[ORM\Column]
    private ?string $coordinates = null;
}