<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $user_admin = new User();
        $user = new User();

        $user_admin->setEmail('admin@admin.com');
        $user_admin->setName('Админ');
        $user_admin->setPhone('81234567890');
        $user_admin->setBirthday(new \DateTime("23.08.1999"));
        $user_admin->setPassword($this->passwordEncoder->encodePassword(
            $user_admin,
            'admin123'
        ));
        $user_admin->setRoles(['ROLE_ADMIN']);

        $user->setEmail('user@user.com');
        $user->setName('Кирилл');
        $user->setPhone('81234567890');
        $user->setBirthday(new \DateTime("23.08.1999"));
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'user123'
        ));

        $manager->persist($user_admin);
        $manager->persist($user);

        $manager->flush();
    }
}
