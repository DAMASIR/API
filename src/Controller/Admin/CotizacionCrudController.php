<?php

namespace App\Controller\Admin;

use App\Entity\Cotizacion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CotizacionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cotizacion::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
