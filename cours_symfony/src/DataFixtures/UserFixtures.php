<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;



class UserFixtures extends Fixture

{

    private $passwordEncoder;
    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

  


    public function load(ObjectManager $manager): void
    {
    
        $user = new User();
        $user->setEmail("enzo@enzo.fr");
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->passwordEncoder->hashPassword(
            $user,
            'enzo'
        ));


        $manager->persist($user);
        $user2 = new User();
        $user2->setEmail("bastien@bastien.fr");
        $user2->setPassword($this->passwordEncoder->hashPassword(
            $user2,
            'bastien'
        ));
        

       
        $manager->persist($user2);
        $manager->flush();
  
    }
}
