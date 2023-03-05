<?php

namespace App\Controller\Admin;

use App\Entity\Region;
use App\Entity\Vin;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use App\Controller\Admin\RegionCrudController;

class VinCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vin::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('robe'),
            AssociationField::new('region'),
            MoneyField::new('prix')->setCurrency('EUR')
        ];
    }
    
}
