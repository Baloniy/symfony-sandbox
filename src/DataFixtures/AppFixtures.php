<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Collection;
use DateTime;
use Knp\DoctrineBehaviors\Contract\Entity\TranslatableInterface;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 2; $i++) {
            $collection = new Collection();
            /** @var TranslatableInterface $collection */
            $collection->translate('ua')->setName('Колекція '.$i);
            $collection->translate('en')->setName('Collection '.$i);
            $collection->translate('ua')->setDescription('Опис колекції '.$i);
            $collection->translate('en')->setDescription('Collection description '.$i);
            $collection->setCreatedAt(new DateTime(sprintf('-%d days', rand(1, 100))));
            $manager->persist($collection);
            $collection->mergeNewTranslations();
        }

        $manager->flush();
    }
}
