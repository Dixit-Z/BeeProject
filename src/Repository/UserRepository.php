<?php namespace App\Repository;

use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function loadUserByUsernamePassword($username, $password)
    {
        return $this->createQueryBuilder('u')
            ->where('u.username = :username AND u.password = :password')
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
?>
