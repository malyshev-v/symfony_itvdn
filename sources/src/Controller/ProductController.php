<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Entity\Category;
use App\Entity\Post;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index(EntityManagerInterface $em, ProductRepository $productRepository): Response
    {
        $category = new Category();
        $category->setName('Art');


        $post = new Post();
        $post->setTitle('Testing my new post');
        $post->setDescription('Testing my new post description');
        $post->setAuthor('admin');
        $post->setCategory($category);

        $em->persist($category);
        $em->persist($post);
        $em->flush();

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}
