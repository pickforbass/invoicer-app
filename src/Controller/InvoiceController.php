<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceController extends AbstractController
{
    /**
     * @Route("/invoices", name="invoices")
     */
    public function index(): Response
    {
        return $this->render('invoice/index.html.twig', [
            'controller_name' => 'InvoiceController',
        ]);
    }


    /**
     * @Route("/invoice/new", name="new-invoice")
     */
    public function newInvoice(): Response
    {
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
