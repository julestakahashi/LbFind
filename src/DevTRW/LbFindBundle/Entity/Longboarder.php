<?php
namespace DevTRW\LbFindBundle\Longboarder;

use Doctrin\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name=Longboarder)
 */
class Longboarder
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $username;

    /**
     * @ORM\Column(type="text")
     */
    protected $location;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    protected $discipline;

    /**
     * @ORM/Column(type="integer", nullable=true)
     */
    protected $age;
}
