<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Task;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Create a new Faker object
        $faker = Factory::create('fr_FR');

        // Crate between 15 and 30 task object
        for($i = 0; $i < mt_rand(15, 30); $i++){

            //Crate a new task object
            $task = new Task;
            
            //Feed task object
            $task->setName($faker->sentence(6))
                ->setDescription($faker->paragraph(3))
                ->setCreatedAt(new \DateTime())
                ->setDueAt($faker->dateTimeBetween('now', '6 month'));

                //Persist datas
                $manager->persist($task);
        }

        //Push
        $manager->flush();
    }
}
