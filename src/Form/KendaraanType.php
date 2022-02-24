<?php

namespace App\Form;

use App\Entity\Kendaraan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KendaraanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('jenis_kendaraan')
            ->add('merk')
            ->add('tahun_pembuatan')
            ->add('nomor_rangka')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Kendaraan::class,
        ]);
    }
}
