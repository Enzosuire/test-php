<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Entity\Personne;
use App\Repository\PersonneRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Util\Xml\Validator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PersonneController extends AbstractController
{
    #[Route('/personne/add', name: 'app_personne')]
    public function index(EntityManagerInterface $entityManager,ValidatorInterface $validator): Response
    {
        /* adresse */
        $adresse = new Adresse();
        $adresse->setRue('Jolie');
        $adresse->setVille('Lyon');
        $adresse->setCodePostal('69000');
        
        /* premiere personne */
        $personne = new Personne();
        $personne->setNom('Cohen');
        $personne->setPrenom('Sophie');
        $personne->setSexe('femme');
        $personne->setAdresse($adresse);
        /* deuxième personne */
        $personne2 = new Personne();
        $personne2->setNom('Wolf');
        $personne2->setPrenom('Bob');
        $personne2->setSexe('homme');
        $personne2->setAdresse($adresse);

        $errrors = $validator->validate($personne);
        if (count($errrors) > 0 ) {
            return new Response((string) $errrors ,400);
        }
        /* persistance de données */
        $entityManager->persist($personne);
        $entityManager->persist($personne2);
        $entityManager->flush();

        return $this->render('personne/index.html.twig', [
            'controller_name' => 'PersonneController',
            'personne' => $personne,
            'adjectif'=> 'ajoutée'
        ]);
    }

    // #[Route('/personne/{id}', name: 'personne_show')]
    // public function showPersonne(int $id, PersonneRepository $personneRepository): Response
    // {
    //     $personne = $personneRepository->find($id);
    //     if (!$personne) {
    //         throw $this->createNotFoundException('Personne non trouvée avec l\'id' . $id);
    //     }
    //     return $this->render('personne/index.html.twig', [
    //         'controller_name' => 'Personne Controller',
    //         'personne' => $personne,
    //         'adjectif' => 'recherchée'
    //     ]);
    // }

    // #[Route('/personne/{nom}/{prenom}', name:'personne_show_one')]

    // public function showPersonneByNomAndPrenom(string $nom, string $prenom, PersonneRepository $personneRepository)
    // {
    //     $personne = $personneRepository->findOneBy([
    //         "nom" => $nom,
    //         "prenom"=> $prenom
    //     ]);
    //     if (!$personne) {
    //         throw $this->createNotFoundException('
    //         Personne non trouvée ');
    // }
    // return $this->render('personne/index.html.twig', [
    //     'controller_name' => 'PersonneController',
    //     'personne' => $personne,
    //     'adjectif'=> 'recherchée'
    // ]);
    // }

    // #[Route('/personne/show', name:'personne_show_all')]

    // public function showAllPersonne(PersonneRepository $personneRepository)
    // {
    //     $personnes = $personneRepository->findAll();
    //     if (!$personnes) {
    //         throw $this->createNotFoundException('
    //         La table est vide ');
    // }
    // return $this->render('personne/show.html.twig', [
    //     'controller_name' => 'PersonneController',
    //     'personnes' => $personnes,
       
    // ]);
    // }

    // #[Route('/personne/edit/{id}', name:'personne_update')]
    // public function updatePersonne(int $id, EntityManagerInterface $entityManager)
    // {
    //     $personne = $entityManager->getRepository(Personne::class)->find($id);
        
    //     if (!$personne) {
    //         throw $this->createNotFoundException('
    //         Personne non trouvée avec l\'id  ' .$id);
    // }
    // $personne->setNom('Jones');
    // $entityManager->flush();
    // return $this->render('personne/index.html.twig', [
    //     'controller_name' => 'PersonneController',
    //     'personne' => $personne,
    //     'adjectif'=> 'modifiée'
    // ]);
    // }

    // #[Route('/personne/edit/{id}', name:'personne_delete')]
    // public function deletePersonne(int $id, EntityManagerInterface $entityManager)
    // {
    //     $personne = $entityManager->getRepository(Personne::class)->find($id);
        
    //     if (!$personne) {
    //         throw $this->createNotFoundException('
    //         Personne non trouvée avec l\'id  ' .$id);
    // }
    // $entityManager->remove($personne);
    // $entityManager->flush();
    // return $this->redirectToRoute('personne_show_all', [
     
    // ]);
    // }

    
    // #[Route('/personne/show/{nom}/{prenom}/{number}', name:'personne_show_some')]
    // public function showSomePersonne(string $nom, string $prenom, int $number, PersonneRepository $personneRepository)
    // {
    //     dump($number);
    //     $personnes = $personneRepository->findBy([
    //         'nom'=> $nom,
    //         'prenom'=> $prenom,
    //         'id'=> $number,
    //     ],
    //     ["nom" => "ASC"],
    // );
        
    //     if (!$personnes) {
    //         throw $this->createNotFoundException('
    //         Aucun résultat trouvé');
    // }
    // return $this->render('personne/show.html.twig', [

    //     'controller_name' => 'PersonneController',
    //     'personnes' => $personnes,
     
    // ]);
    // }

    // #[Route('/personne/{nom}/{prenom}', name:'personne_show_one')]
    // public function showPersonneByNomAndPrenom(string $nom, string $prenom, PersonneRepository $personneRepository)
    // {
    //     $personne = $personneRepository->findOneByNomAndPrenom($nom,$prenom);
        
    //     if (!$personne) {
    //         throw $this->createNotFoundException('
    //         Personne non trouvée ');
    // }

    // return $this->render('personne/index.html.twig',[
    //     'controller_name' => 'PersonneController',
    //     'personne' => $personne,
    //     'adjectif' => 'recherchée'
    // ]);
   
    // }




   
}
