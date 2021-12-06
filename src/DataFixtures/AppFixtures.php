<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $hash;
    public function __construct(UserPasswordHasherInterface $password)
    {
        $this->hash = $password;
    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setEmail("a@b.c");
        $user->setUsername("Darunia");
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setIsVerified(TRUE);
        $user->setPassword($this->hash->hashPassword($user, "azerty"));
        $manager->persist($user);
        $manager->flush();
    }
}
