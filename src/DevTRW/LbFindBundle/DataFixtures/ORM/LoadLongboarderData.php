<?php
namespace DevTRW\LbFindBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use DevTRW\LbFindBundle\Entity\Longboarder;

class LoadLongboarderData implements FixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $em)
    {
        $longboarder1 = new Longboarder();
        $longboarder1->setUsername("turdgoblin");
        $longboarder1->setLocation("Portland, Oreon");
        $longboarder1->setAge(90);

        $longboarder2 = new Longboarder();
        $longboarder2->setUsername("dingleberry");
        $longboarder2->setLocation("New York, New York");
        $longboarder2->setAge(80);

        $longboarder3 = new Longboarder();
        $longboarder3->setUsername("Dogebooger");
        $longboarder3->setLocation("Anchorage, Alaska");
        $longboarder3->setAge(200);

        $em->persist($longboarder1);
        $em->persist($longboarder2);
        $em->persist($longboarder3);

        $em->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}