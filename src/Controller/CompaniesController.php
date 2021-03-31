<?php

namespace App\Controller;

use App\Entity\Companies;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class CompaniesController extends AbstractController
{
    /**
     * @Route("/configuration/societes", name="companies")
     */
    public function lightVehicles(Request $request)
    {
        $allCompanies = $this->getDoctrine()->getRepository(Companies::class);
        $companies = $allCompanies->findAll();

        return $this->render('settings/companies.html.twig', ['companies' => $companies]);
    }
}
