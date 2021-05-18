<?php

namespace App\Controller\Admin;

use App\Entity\Answer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AnswerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Answer::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextEditorField::new('text');
        $publish_date = DateTimeField::new('publish_date');
        $question = AssociationField::new('question');
        $author = AssociationField::new('author');
        if (Crud::PAGE_EDIT === $pageName) {
            yield $publish_date->setFormTypeOption('disabled', true);
            yield $question->setFormTypeOption('disabled', true);
            yield $author->setFormTypeOption('disabled', true);
        } else {
            yield $publish_date;
            yield $question;
            yield $author;
        }

    }
}
