<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i=1; $i <= 100 ; $i++) { 
            $image = new Image();
            $image->setName($faker->image(null, 640, 480));
            $product = $this->getReference('prod-'.rand(1, 10));
            $image->setProduct($product);

            $manager->persist($image);
        }

        $manager->flush();
    }

    public function getDependencies() : array
    {
        return [
            ProductFixtures::class
        ];
    }
}
