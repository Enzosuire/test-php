<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonneRepository::class)]
class Personne
{

   #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string", length: 255)]
    private $nom;

    #[ORM\Column(type: "string", length: 255)]
    private $prenom;


    /**
     * Get the value of id
     */
    public function getId(): int 
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id)
    {
        $this->id = $id;

       
    }

    /**
     * Get the value of nom
     */
    public function getNom():? string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom(string $nom)
    {
        $this->nom = $nom;

       
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom(): ? string
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     */
    public function setPrenom(string $prenom){

        $this->prenom = $prenom;

        
    }
}
