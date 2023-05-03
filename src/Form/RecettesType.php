<?php

namespace App\Form;

use App\Entity\Recettes;
use App\Entity\Categories;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;

class RecettesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
            ])
            ->add('description', TextareaType::class, [
                'required' => true
            ])
            ->add('cooking_time', IntegerType::class, [
                'required' => true,
            ])
            ->add('ingredient', TextareaType::class, [
                'required' => true
            ])
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
                // 'delete_label' => '...',
                // 'download_label' => '...',
                'download_uri' => true,
                'image_uri' => true,
                // 'imagine_pattern' => '...',
                'asset_helper' => true,
            ])
            ->add('categories', EntityType::class,[
                'required' => true,  
                'class' => Categories::class,
                'choice_label' => 'name'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recettes::class,
        ]);
    }
}
