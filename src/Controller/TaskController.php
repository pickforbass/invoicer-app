<?php

namespace App\Controller;

use App\Entity\Task;
use PhpParser\Node\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormBuilderInterface;


class TaskController extends AbstractController
{
    /**
     * @return Response
     * @Route("/tasks", name="tasks")
     */
    public function index(): Response
    {

        $repo = $this->getDoctrine()->getRepository(Task::class);
        $tasks = $repo->findAll();
        return $this->render('task/index.html.twig', [
            'controller_name' => 'Liste des tâches',
            'tasks' => $tasks
        ]);
    }


    /**
     *
     * @param EntityManagerInterface $manager
     * @param Request $req
     * @return Response
     * @Route("/task/new", name ="newTask")
     */
    public function newTask(EntityManagerInterface $manager, Request $req): Response
    {
        $newtask = new Task();
        $form = $this->createFormBuilder($newtask)
            ->add('name')
            ->add('fee')
            ->getForm();

        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($newtask);
            $manager->flush();

            return $this->redirectToRoute('tasks');
        }

        return $this->render('task/newtask.html.twig', [
            "controller_name" => "Nouvelle tâche",
            "new_task_form" => $form->createView(),
        ]);
    }

    /**
     * @param Request $req
     * @param EntityManagerInterface $manager
     * @param $id
     * @return Response
     * @Route ("task/{id}", name="updateTask")
     */
    public function updateTask(Request $req, EntityManagerInterface $manager, $id): Response
    {
        $manager = $this->getDoctrine()->getManager();
        $task = $manager->getRepository(Task::class)->find($id);

        $form = $this->createFormBuilder($task)
            ->add('Name')
            ->add('fee')
            ->getForm();

        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->flush();

            return $this->redirectToRoute("tasks");
        }


        return $this->render('task/task.html.twig', [
            'controller_name'=> 'Tâche',
            'task'=> $task,
            'form'=> $form->createView()
        ]);
    }

}

