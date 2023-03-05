<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;
use Faker;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProductFixtures extends Fixture
{
    private int $counter = 1;

    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i=1; $i <=10 ; $i++) { 
            $product = new Product();
            $product->setName($faker->text(10));
            $product->setDescription($faker->text());
            $product->setSlug($this->slugger->slug($product->getName())->lower());
            $product->setPrice($faker->numberBetween(900, 150000));
            $product->setStock($faker->numberBetween(1, 15));

            $category = $this->getReference('cat-'.rand(1, 5));
            $product->setCategorie($category);

            $manager->persist($product);

            $this->addReference('prod-'.$this->counter, $product);
            $this->counter++;
    
        }

        $manager->flush();
    }
}
