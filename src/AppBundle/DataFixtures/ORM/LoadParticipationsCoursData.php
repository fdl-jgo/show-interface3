<?php 

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

use AppBundle\Entity\ParticipationsCours;

class LoadParticipationsCoursData extends AbstractFixture implements OrderedFixtureInterface
{
    const MAX_NB_COURS = 20;

    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_BE');
        for ($j=1; $j <= self::MAX_NB_COURS; $j++) { 
            for ($i=1; $i <= $this->getReference('cours'.$j)->getNbParticipants(); $i++) { 

                $partCours = new ParticipationsCours();

                $partCours->setPresence(false); 

                $partCours->setPersonne($this->getReference('pers'.(10+$i)));
                $partCours->setCours($this->getReference('cours'.$j));
                $partCours->setActivite($this->getReference('activite' . $faker->randomElement($array = array (1,2,3)) ));
                //$partCours->setMotif($this->getReference('pers'.(10+$i))->getNom());

                $manager->persist($partCours);

                //$this->addReference('pc'.$i, $partCours);
            }
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