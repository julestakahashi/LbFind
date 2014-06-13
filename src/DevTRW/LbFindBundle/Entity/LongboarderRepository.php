<?php
/**
 * Created by PhpStorm.
 * User: julestakahashi
 * Date: 6/13/14
 * Time: 12:21 AM
 */

namespace DevTRW\LbFindBundle\Entity;


use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityRepository;

class LongboarderRepository extends EntityRepository
{
    public function getLongboarderList()
    {
        $em = $this ->getEntityManager();
        $qb = $em->createQueryBuilder();

        return $qb->select('lb')
            ->from(Longboarder::class, 'lb')
            ->getQuery()
            ->getArrayResult();
            //->execute(null, AbstractQuery::HYDRATE_ARRAY)
    }
} 