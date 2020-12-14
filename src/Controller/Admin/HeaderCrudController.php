<?php

namespace App\Controller\Admin;

use App\Entity\Header;
use Doctrine\ORM\EntityManagerInterface;
use App\Controller\Admin\HeaderCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HeaderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Header::class;
    }
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            yield TextField::new('title','Titre du header'),
            yield TextareaField::new('content',' contenu de notre header'),
            
            yield TextField::new('btnTitle','Titre de notre bouton'),
            yield TextField::new('btnUrl','Url de destination de notre bouton'),
            yield ImageField::new('illustration')
            ->setBasePath('uploads/')
            ->setUploadDir('public/uploads')

            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),
            

        ];
        $this->entityManager->persist();
        $this->entityManager->flush();
        
    }
    
    
}
