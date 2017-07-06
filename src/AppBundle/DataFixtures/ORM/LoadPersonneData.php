<?php 

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

use AppBundle\Entity\Personne;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{

	const MAX_NB_PERS = 100;

    public function load(ObjectManager $manager)
    {

    	$faker = Factory::create('fr_BE');

    	for ($i=1; $i <= self::MAX_NB_PERS; $i++) { 

    		$nom = $faker->lastName;
    		// $prenom = $faker->firstName($gender = null|'male'|'female');
    		$genre =  $faker->randomElement(array('homme', 'femme'));
    		// $prenom = $faker->firstName($gender = null|$genre|($genre == 'femme')? 'homme':'femme');
    		$prenom = ($genre == 'homme') ? $faker->firstNameMale : $faker->firstNameFemale;
    		
	        $personne = new Personne();

	        $personne->setNom($nom);
	        $personne->setPrenom($prenom);
	        $personne->setEmail('pers'.$i.'@'.$faker->freeEmailDomain);
	        $personne->setTelephone($faker->numerify('0032 4## ### ###'));
	        $personne->setPassword($prenom);
	        //$personne->setToken('test');
	        $personne->setActif(true);
	        $personne->setBanned(false);
	        $personne->setDateCreation($faker->dateTimeBetween($startDate = '2016-08-31', $endDate = '2016-09-20', $timezone = date_default_timezone_get()));
	        $personne->setCp($faker->postcode);
	        $personne->setSexe($genre);

	        $manager->persist($personne);

	        $this->addReference('pers'.$i, $personne);
	    }    
	        
	    $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}