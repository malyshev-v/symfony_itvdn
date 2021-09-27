<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\RandGenerator;

class NumberController extends AbstractController
{
    /**
     * @Route("/number", name="number")
     */
    public function index(RandGenerator $generator): Response
    {
//        $result = $generator->getNewNumber(1, 15);

        $em = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName('Test name');
        $product->setDescription('Test description');
        $product->setPrice(25);
        $product->setAuthor('Me');

        $em->persist($product);
        $em->flush();

        return new Response('ok');
    }
}
