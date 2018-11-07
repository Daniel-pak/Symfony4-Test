<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class StockAnalysisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('stock_name')
            ->add('analysis_type', ChoiceType::class, array(
              'choices' => array(
                'optional' => NULL,
                'intraday' => 'TIME_SERIES_INTRADAY',
                'daily' => 'TIME_SERIES_DAILY',
                'daily_adjusted' => 'TIME_SERIES_DAILY_ADJUSTED',
                'weekly' => 'TIME_SERIES_WEEKLY',
                'weekly_adjusted' => 'TIME_SERIES_WEEKLY_ADJUSTED',
                'monthly' => 'TIME_SERIES_MONTHLY',
                'monthly' => 'TIME_SERIES_MONTHLY_ADJUSTED'
            )))
            ->add('save', SubmitType::class, array('label' => 'Analyze!'));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
