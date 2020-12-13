<?php

namespace App\Controller\Admin;

use App\Entity\Header;
use Doctrine\ORM\EntityManagerInterface;
use App\Controller\Admin\HeaderCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
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
            TextField::new('title','Titre du header'),
            SlugField::new('slug')->setTargetFieldName('name'),
            TextareaField::new('content',' contenu de notre header'),
            TextField::new('btnTitle','Titre de notre bouton'),
            TextField::new('btnUrl','Url de destination de notre bouton'),
            ImageField::new('illustration')
            ->setBasePath('uploads')
            ->setUploadDir('public/uploads')

            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),

        ];
        $this->entityManager->flush();
    }
    
}
