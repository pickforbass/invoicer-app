<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Invoice;
use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

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

        $invoiceNumber = date('Y');
        $clients = $this->getDoctrine()->getManager()->getRepository(Client::class)->findAll();
        $tasks = $this->getDoctrine()->getManager()->getRepository(Task::class)->findAll();

        $manager = $this->getDoctrine()->getManager()->getRepository(Invoice::class);
        $invoice = new Invoice();
            $form = $this->createFormBuilder($invoice)
                ->add('Client')
                ->add('date')
                ->add('designation', CollectionType::class, [
                    'entry_type'=> TextType::class,
                    'entry_options'=> [
                    'hour'=> TextType::class,
                    "price"=>TextType::class
                    ]])
                ->getForm();

        return $this->render('invoice/new.html.twig', [
            'controller_name' => 'Nouvelle facture',
            'new_invoice'=> $form->createView(),
            'clients'=> $clients,
            'tasks'=> $tasks
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
