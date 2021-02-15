<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Client;

class ClientController extends AbstractController
{
    /**
     * @Route("/clients", name="clients")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Client::class);
        $clientList = $repo->findAll();


        return $this->render('client/index.html.twig', [
            'controller_name' => 'Client',
            'clients' => $clientList,
        ]);
    }

    /**
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     * @Route("client/new", name="newClient")
     */

    public function newClient(Request $request, EntityManagerInterface $manager): Response {
        $client = new Client();
        $form = $this->createFormBuilder($client)
            ->add('name')
            ->add('familyName')
            ->add('SocialName')
            ->add('VATnumber')
            ->add('phone')
            ->add('email')
            ->add('street')
            ->add('Zipcode')
            ->add('city')
            ->add('country')
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($client);
            $manager->flush();
            return $this->redirectToRoute('client',['id'=> $client->getId()]);
        }

        return $this->render('client/new.html.twig', [
            'controller_name' => 'Nouveau client',
            'new_client_form'=> $form->createView()
        ]);

    }

    /**
     * @param $id
     * @param Request $req
     * @param EntityManagerInterface $manager
     * @return Response
     * @Route("/client/{id}", name="client")
     */
        public function client($id, Request $req, EntityManagerInterface $manager): Response
        {
            $repo = $this->getDoctrine()->getRepository(Client::class);
            $client = $repo->find($id);


            $form = $this->createFormBuilder($client)
                        ->add('name')
                        ->add('familyName')
                        ->add('SocialName')
                        ->add('VATnumber')
                        ->add('phone')
                        ->add('email')
                        ->add('street')
                        ->add('Zipcode')
                        ->add('city')
                        ->add('country')
                        ->getForm();
            $form->handleRequest($req);

            if($form->isSubmitted() && $form->isValid()) {
                $manager->flush();
                return $this->redirectToRoute('client', [$id]);
            }


            return $this->render('client/client.html.twig', [
                'controller_name' => 'Fiche Client',
                'client'=> $client,
                'update_form' => $form->createView()
            ]);
        }

}
