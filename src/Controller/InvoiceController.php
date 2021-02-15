<?php

namespace App\Controller;

use App\Entity\Invoice;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
     * @param EntityManagerInterface $manager
     * @param Request $request
     * @return Response
     */
    public function newInvoice(EntityManagerInterface $manager, Request $request): Response
    {
//        $manager = $this->getDoctrine()->getManager()->getRepository(Invoice::class);
//        $invoice = new Invoice();
//            $form = $this->createFormBuilder($invoice)
//                ->add('client')
//                ->add('date')
//                ->add('designation')
//                ->add('time')
//                ->add('price')
//                ->getForm();
//


        return $this->render('invoice/new.html.twig', [
            'controller_name' => 'Nouvelle facture',
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
