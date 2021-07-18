<?php

namespace App\DataFixtures;


use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
   
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create();
        $property = new Property();
        $table = [];

        for($i=0; $i<50; $i++)
        {
            $property = new Property();
            $property->setTitle($faker->text(10));
            $property->setDescription($faker->text(250));
            $property->setHnr($faker->numberBetween(1,300).''.$faker->randomLetter);
            $property->setCity($faker->city);
            $property->setPlz($faker->postcode);
            $property->setStreet($faker->streetName);
            $property->setSurface($faker->numberBetween(10,9000));
            $property->setBadrooms($faker->numberBetween(1,5));
            $property->setRooms($faker->numberBetween(1,10));
            $property->setPrice($faker->numberBetween(1000,999999));
            $property->setFloor($faker->numberBetween(0,10));
            $property->setImage($faker->imageUrl());
            $manager->persist($property);
            
            $table[] = $property;
        }

        $manager->flush();
    }
}
