<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Companies;
use App\Entity\LightVehicles;
use App\Entity\LVehiclesDocuments;
use App\Entity\LVehiclesRentals;
use App\Entity\VehiclesKind;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class FacturesPDFController extends AbstractController
{
    /**
     * @Route("/facture_location/", name="facturePDF")
     */
    public function index()
    {
        $allCompanies = $this->getDoctrine()->getRepository(Companies::class);
        $companies = $allCompanies->findAll();

        $allVehicles = $this->getDoctrine()->getRepository(LightVehicles::class);
        $vehicles = $allVehicles->findAll();

        $allCategories = $this->getDoctrine()->getRepository(Categories::class);
        $categories = $allCategories->findAll();


        $date = new DateTime();

        $month = $date->format('m');
        $year =  $date->format('Y');

        $jour = Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
        $startDay = $jour[date("w", mktime(0, 0, 0, $month, 1, $year))];
        $endDay = $jour[date("w", mktime(0, 0, 0, $month+1, 0, $year))];

        $startMonth = $jour[date("w", mktime(0, 0, 0, 03, 1, 2021))];
        $endMonth = $jour[date("w", mktime(0, 0, 0, $month+1, 0, $year))];

        $pdfOptions = new Options();
        $pdfOptions->set('isHtml5ParserEnabled', 'true');
        $pdfOptions->set('enable_remote', true);
        $dompdf = new Dompdf($pdfOptions);
        $html = $this->renderView('pdf_twig/facture.html.twig', ['companies' => $companies, 'categories' => $categories, 'vehicles' => $vehicles, 'startMonth' => $startMonth, 'endMonth' => $endMonth, 'startDay' => $startDay, 'endDay' => $endDay, 'month' => $month, 'year' => $year ]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $output = $dompdf->output();
        $pdfFilepath =  'TEST_FACTURE.pdf';
        file_put_contents($pdfFilepath, $output);

        return $this->redirect('/'.$pdfFilepath);
    }
}