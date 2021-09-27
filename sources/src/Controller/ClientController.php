<?php

namespace App\Controller;

use PHPUnit\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClientRepository;
use App\Entity\Client;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/client")
 *
 * @author Valeriy Malyshev <v.malyshev@piogroup.net>
 */
class ClientController extends AbstractController
{
    /**
     * @Route("/", name="client_index")
     */
    public function indexAction(): Response
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    /**
     * @Route("/list", name="client_list")
     *
     * @param ClientRepository $clientRepository
     */
    public function listAction(ClientRepository $clientRepository)
    {
        $clients = $clientRepository->findAll();
        dd($clients);
    }

    /**
     * @Route("/test", name="client_test")
     *
     * @param EntityManagerInterface $em
     * @return bool
     */
    public function testAction(EntityManagerInterface $em) : bool
    {
        $names = [
            'Vasyan',
            'Kolyan',
            'Toha',
            'Seryoga',
        ];

        $surnames = [
            'Tihiy',
            'Beliy',
            'Severniy',
            'Vodolaz',
        ];

        $descriptions = [
            'Norm pacan',
            'Petuh',
            'Krasava',
            'Rovniy tip',
        ];

        $emails = [
            'test1@email.com',
            'test2@email.com',
            'test3@email.com',
            'test4@email.com',
        ];

        $phones = [
            111,
            222,
            333,
            444,
        ];

        $ages = [
            20,
            30,
            40,
            50,
        ];

        try {
            for ($i = 0; $i < 2; $i++) {
                $client = new Client();
                $client->setName($names[rand(0, 3)]);
                $client->setSurname($surnames[rand(0, 3)]);
                $client->setDescription($descriptions[rand(0, 3)]);
                $client->setEmail($emails[rand(0, 3)]);
                $client->setPhone($phones[rand(0, 3)]);
                $client->setAge($ages[rand(0, 3)]);
                $em->persist($client);
                $em->flush();
            }
        } catch (Exception $e) {
            echo $e;
            return false;
        }
        return true;
    }
}
