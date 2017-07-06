<?php 

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

use AppBundle\Entity\Activite;

class LoadActiviteData extends AbstractFixture implements OrderedFixtureInterface
{

    const MAX_NB_ACT = 5;

    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_BE');

        for ($i=1; $i <= self::MAX_NB_ACT; $i++) { 

            $activite = new Activite();

            $activite->setNom('activite'.$i);
            $activite->setDescription($faker->sentence($nbWords = 10, $variableNbWords = true));
            $activite->setVisible(true);

            $manager->persist($activite);

            $this->addReference('activite'.$i, $activite);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 3;
    }
}