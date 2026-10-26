<?php

namespace App\Form\Type\User;

use App\Form\Type\Block\Core\CtaType;
use Enhavo\Bundle\FormBundle\Form\Type\WysiwygType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $disabled = $options['disabled'];

        $builder
            ->add('title', ChoiceType::class, [
                'label' => 'anrede',
                'placeholder' => 'Auswählen',
                'required' => false,
                'choices' => [
                    'herr'=>'herr',
                    'frau'=>'frau',
                    'divers'=>'divers',
                ],
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Vorname',
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nachname',
            ])
            ->add('message', WysiwygType::class, [
                'label' => 'Message',
            ])
            ->add('disclaimer', CheckboxType::class, [
                'required' => false,
                'label' => $options['disclaimer_label'] ?? null,
            ])
            ->add('ctaTitle', CtaType::class, [
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'disclaimer_label' => null,
        ]);
    }

}
