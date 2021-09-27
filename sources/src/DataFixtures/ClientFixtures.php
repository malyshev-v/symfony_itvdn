<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Client;

class ClientFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $client = new Client();
        $client->setName('test name fixtures');
        $client->setSurname('test surname fixtures');
        $client->setDescription('test description fixtures');
        $client->setEmail('test email fixtures');
        $client->setPhone(007);
        $client->setAge(99);

        $client2 = new Client();
        $client2->setName('test2 name fixtures');
        $client2->setSurname('test2 surname fixtures');
        $client2->setDescription('test2 description fixtures');
        $client2->setEmail('test2 email fixtures');
        $client2->setPhone(5);
        $client2->setAge(49);

        $manager->persist($client);
        $manager->persist($client2);
        $manager->flush();
    }
}
