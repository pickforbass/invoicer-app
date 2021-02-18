<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Invoice;
use App\Entity\Task;
use App\Form\DesignationInvoiceMakerType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Selectable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Form\FormTypeInterface;

class InvoiceController extends AbstractController
{
    /**
     * @Route("/invoices", name="invoices")
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function index(EntityManagerInterface $manager): Response
    {
        $manager = $this->getDoctrine()->getManager()->getRepository(Invoice::class);

        $invoices = $manager->findAll();

        return $this->render('invoice/index.html.twig', [
            'controller_name' => 'Factures',
            'invoices' => $invoices
        ]);
    }


    /**
     * @Route("/invoice/new", name="new-invoice")
     * @param Request $request
     * @return Response
     */
    public function newInvoice(Request $request): Response
    {
        $manager = $this->getDoctrine()->getManager();

        $invoice = new Invoice();
        $form = $this->createFormBuilder($invoice)
            ->add('Client', EntityType::class, [
                'class' => Client::class,
            ])
            ->add('date', DateType::class, [
                'format' => 'dd-MMMM-yyyy'
            ])
            ->add('designation', DesignationInvoiceMakerType::class, [
                'entry_type'=> TextType::class,
            ])
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $manager->persist($invoice);
            $manager->flush();
        }

        return $this->render('invoice/new.html.twig', [
            'controller_name' => 'Nouvelle facture',
            'new_invoice'=> $form->createView(),
            'tasks'=> $manager->getRepository(Task::class)->findAll(),
        ]);
    }

    /**
     * @Route("/invoice/{id}", name="invoice")
     */
    public function invoice(): Response
    {
        return $this->render('invoice/index.html.twig', [
            'controller_name' => 'InvoiceController',
        ]);
    }


}
