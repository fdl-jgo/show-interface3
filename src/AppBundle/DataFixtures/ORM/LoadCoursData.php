<?php 

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

use AppBundle\Entity\Cours;

class LoadCoursData extends AbstractFixture implements OrderedFixtureInterface
{

    const MAX_NB_COURS = 20;

    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_BE');

        for ($i=1; $i <= self::MAX_NB_COURS; $i++) { 

            $cours = new Cours();

            $cours->setNom('cours'.$i);
            $cours->setDateDebut($faker->dateTimeBetween($startDate = '2016-09-15', $endDate = 'now', $timezone = date_default_timezone_get()));
            $cours->setDescription($faker->sentence($nbWords = 10, $variableNbWords = true));
            $cours->setCollectif(true);
            $cours->setDuree($faker->randomElement($array = array (4,5,6,7)));
            $cours->setNbParticipants($faker->randomElement($array = array (6,8,10,12)));
            $cours->setPrix($faker->randomElement($array = array (20,30,40,80)));
            $cours->setDateCreation($faker->dateTimeBetween($startDate = '2016-08-01', $endDate = '2016-08-31', $timezone = date_default_timezone_get()));

            // $personne = $this->getReference('pers'.$faker->randomDigitNotNull)
            $cours->setPersonne($this->getReference('pers'.$faker->randomDigitNotNull));

            $manager->persist($cours);

            $this->addReference('cours'.$i, $cours);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}