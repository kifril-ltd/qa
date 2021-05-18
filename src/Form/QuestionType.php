<?php

namespace App\Form;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null,[
                'label' => 'Заголовок',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Введите текст заголовка',
                    ]),
                ]
            ])
            ->add('text', TextareaType::class, [
                'label' => 'Текст вопроса',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Введите текст вопроса',
                    ]),
                ]
            ])
            ->add('category', null, [
                'label' => 'Категория',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Введите категорию',
                    ]),
                ]
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
}
