<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $product = new Product();
        $product->setName('test name fixtures');
        $product->setDescription('test description fixtures');
        $product->setPrice(49);
        $product->setAuthor('test author fixtures');

        $product2 = new Product();
        $product2->setName('test2 name fixtures');
        $product2->setDescription('test2 description fixtures');
        $product2->setPrice(99);
        $product2->setAuthor('test2 author fixtures');

        $manager->persist($product);
        $manager->persist($product2);
        $manager->flush();
    }
}