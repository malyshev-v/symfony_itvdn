<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewController extends AbstractController
{
    /**
     * @Route("/new/{name}", name="new")
     */
    public function index(Request $request): Response
    {
        $value = 'my new value';

        $routeName = $request->attributes->get('_route');
        $routeParameters = $request->attributes->get('_route_params');

        $listShowPage = $this->generateUrl('new', [
            'name' => 'check',
        ]);

        return $this->render('new/index.html.twig', [
            'value' => $value,
            'routeName' => $routeName,
            'routeParameters' => $routeParameters,
        ]);
    }
}
