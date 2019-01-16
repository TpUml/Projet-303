<?php

namespace AeroGest\VolBundle\Entity;

use Doctrine \ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * Classe représentatnt l'utilisateur de la plateforme
 *
 * @author Shannon
 */
/**
 * @ORM\Table(name="aerogeest_user")
 * @ORM\Entity(repositoryClass="AeroGest\VolBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
}
