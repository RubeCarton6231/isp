<?php
namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombreProblema')
            ->add('descripcionProblema', TextareaType::class, [
                'attr' => ['rows' => 5],
                'empty_data' => '',
                'required' => true,
                'label' => 'Descripción del problema',
                'help' => 'Escriba una descripción detallada del problema',
                'help_attr' => ['class' => 'help-text'],
                'help_html' => true,
                'label_attr' => ['class' => 'label-text'],
            ])            
            //->add('estado')
            //->add('idCliente')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}