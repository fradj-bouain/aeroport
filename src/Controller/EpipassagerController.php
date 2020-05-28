<?php

namespace App\Controller;
use App\Entity\Epipassager;
use App\Entity\Image;
use App\Form\EpipassagerType;
use App\Repository\EpipassagerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Forms;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;


class EpipassagerController extends AbstractController
{
    /**
     * @Route("/", name="epipassager_index")
     */
    public function index()
    {
       $epipassagerRepository = $this->getDoctrine()->getRepository(Epipassager::class)->findAll();
        return $this->render('epipassager/index.html.twig', [
            'epipassagers' => $epipassagerRepository,
        ]);
    }


    /**
     * @Route("/new", name="epipassager_new")
     */
    public function new(Request $request )
    {
        $epipassager = new Epipassager();
        $form = $this->createForm(EpipassagerType::class, $epipassager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

               $image = new image();
               $image->setUrl('about-img1.jpg');
               $image->setAlt('Developeur andoid');
               $epipassager->setImage($image);

            $entityManager = $this->getDoctrine()->getManager();
                 $entityManager->persist($epipassager);
                  $entityManager->flush();
                  $this->addFlash('success','Bien Ajouter avec succés');
                              return $this->redirectToRoute('epipassager_index');

        }

        return $this->render('epipassager/new.html.twig', [
            'epipassager' => $epipassager,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="epipassager_show" ,  requirements={"id"="\d+"})
     */
    public function show($id)
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository((Epipassager::class));
    	$epipassager = $repository->find($id);

    	if(null === $epipassager){
                          $this->addFlash('danger',"le passager ayant n'exist pas");

    		
    	}
        return $this->render('epipassager/show.html.twig', [
            'epipassager' => $epipassager,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="epipassager_edit" , requirements={"id"="\d+"})
     */
    public function edit(Request $request, $id)
    {


        $epipassager = $this->getDoctrine()
                ->getManager()
                ->getRepository(Epipassager::class)
                ->find($id);
    $form = $this->createForm(EpipassagerType::class ,$epipassager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $image = new image();
               $image->setUrl('..\..\..\..\public\img\about-img1.jpg');
               $image->setAlt('Developeur andoid');
               $epipassager->setImage($image);

            $entityManager = $this->getDoctrine()->getManager();
                 $entityManager->persist($epipassager);
                  $entityManager->flush();
                  $this->addFlash('success','Bien Modifeir avec succés');
                              return $this->redirectToRoute('epipassager_index');

        }

           return $this->render('epipassager/edit.html.twig', [
            'epipassager' => $epipassager,
            'form' => $form->createView(),
        ]);

        
    }

    /**
     * @Route("/{id}", name="epipassager_delete" , requirements={"id"="\d+"})
     */
    public function delete(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $epipassager = $em->getRepository(Epipassager::class)->find($id);
        $em->remove($epipassager);
        $em->flush();
        return $this->redirectToRoute('epipassager_index');
    }





 }
