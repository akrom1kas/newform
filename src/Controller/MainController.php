<?php

namespace App\Controller;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Naujas;
use App\Form\FormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;




class MainController extends AbstractController
{

    /**
     * @Route("/", name="main")
     */
    public function index(ManagerRegistry $doctrine): Response
    {

        $data = $doctrine->getRepository(Naujas::class)->findAll();
        return $this->render('main/index.html.twig', [
            'MainController' =>'MainController',
            'list' => $data
        ]);
    }

    /**
     * @Route("/create", name="create")
     *
     */

    public function create(Request $request, ManagerRegistry $doctrine )
    {
        $naujas = new Naujas();
        $form = $this->createForm(FormType::class, $naujas);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $doctrine->getManager();
            $em->persist($naujas);
            $em->flush();

            $this->addFlash('notice','Submitted Successfully!');

            return $this->redirectToRoute('main');
        }
        return $this->render('main/create.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/update/{id}", name="Update")
     */

    public function update(Request $request,$id, ManagerRegistry $doctrine )
    {
        $naujas = $doctrine->getRepository(Naujas::class)->find($id);
        $form = $this->createForm(FormType::class, $naujas);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $doctrine->getManager();
            $em->persist($naujas);
            $em->flush();

            $this->addFlash('notice','Update Successfully!');

            return $this->redirectToRoute('main');
        }
        return $this->render('main/update.html.twig',[
            'form' => $form->createView()


        ]);
    }

    /**
     * @Route("/delete/{id}", name="Delete")
     */

    public function delete($id, ManagerRegistry $doctrine )
    {
        $data = $doctrine->getRepository(Naujas::class)->find($id);
        $em = $doctrine->getManager();
        $em->remove($data);
        $em->flush();

        $this->addFlash('notice', 'Delete Successfully!');

        return $this->redirectToRoute('main');
    }


}



