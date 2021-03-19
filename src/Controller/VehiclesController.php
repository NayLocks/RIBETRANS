<?php

namespace App\Controller;

use App\Entity\Companies;
use App\Entity\LightVehicles;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class VehiclesController extends AbstractController
{
    /**
     * @Route("/vehicules/leger", name="lightVehicles")
     */
    public function lightVehicles(Request $request)
    {
        $allLightVehicles = $this->getDoctrine()->getRepository(LightVehicles::class);
        $lightVehicles = $allLightVehicles->findAll();

        $allCompanies = $this->getDoctrine()->getRepository(Companies::class);
        $companies = $allCompanies->findAll();

        return $this->render('vehicles.html.twig', ['vehicles' => $lightVehicles, 'companies' => $companies]);
    }
}
