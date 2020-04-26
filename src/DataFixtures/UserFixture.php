<?php
declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixture extends Fixture
{
    private $passwordEncoder;

    /**
     * UserFixture constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface$passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
       
//        $user = new User();
//        $user->setFirstName('Andriy');
//        $user->setEmail('andreybaloniy@gmail.com');
//        $user->setPassword($this->passwordEncoder->encodePassword($user, 'the_new_password'));
//        $manager->persist($manager);
//        $manager->flush();
    }
}
