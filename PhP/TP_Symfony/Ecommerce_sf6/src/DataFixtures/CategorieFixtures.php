<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategorieFixtures extends Fixture
{
    private int $counter = 1;

    // private $slugger;

    // public function __construct(SluggerInterface $slugger)
    // {
    //     $this->slugger = $slugger;
    // }

    public function __construct(private SluggerInterface $slugger){}
 
    public function load(ObjectManager $manager): void
    {
        //$parent = $this->createCategorie(name: 'Informatique', manager: $manager);
        $parent = $this->createCategorie('Informatique', null, $manager);
        $this->createCategorie('Ecran', $parent, $manager);
        $this->createCategorie('Clavier', $parent, $manager);
        $this->createCategorie('Ordinateur portable', $parent, $manager);
        $this->createCategorie('Téléhone', null, $manager);
        //$this->createCategorie(name: 'Téléhone', manager: $manager);

        $manager->flush();
    }

    public function createCategorie(string $name, Categorie $parent = null, ObjectManager $manager){
        $category = new Categorie();
        $category->setName($name);
        $category->setSlug($this->slugger->slug($category->getName())->lower());
        $category->setParent($parent);
        $manager->persist($category);

        $this->addReference('cat-'.$this->counter, $category);
        $this->counter++;

        return $category;
    }
}
