<?php

namespace App\Controller;

use App\Entity\Companies;
use App\Entity\LightVehicles;
use App\Entity\LVehiclesDocuments;
use App\Entity\LVehiclesRentals;
use App\Entity\Settings;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class RentalsPDFController extends AbstractController
{
    /**
     * @Route("/contrat_location/{numberPlate}/{id}", name="rentalPDF")
     */
    public function index($numberPlate, $id)
    {
        $allSettings = $this->getDoctrine()->getRepository(Settings::class);
        $company = $allSettings->findAll();

        $allRentals = $this->getDoctrine()->getRepository(LVehiclesRentals::class);
        $rental = $allRentals->findOneBy(array('id' => $id));

        $day = $rental->getStartRental()->format('d');
        $month = $rental->getStartRental()->format('m');
        $year =  $rental->getStartRental()->format('Y');

        $start = $rental->getStartRental();
        $start = $start->format('d-m-Y');
        $end = $rental->getEndRental();
        $end = $end->format('d-m-Y');

        $time = strtotime($rental->getStartRental()->format('Y/m/d'));
        $jour = Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
        $jour = $jour[date('w', mktime(0,0,0,date('m', $time),date('d', $time),date('Y', $time)))];

        $date = new DateTime();

        $pdfOptions = new Options();
        $pdfOptions->set('isHtml5ParserEnabled', 'true');
        $pdfOptions->set('enable_remote', true);
        $dompdf = new Dompdf($pdfOptions);
        $html = $this->renderView('pdf_twig/rental_pdf.twig', ['company' => $company[0], 'rental' => $rental, 'jour' => $jour, 'day' => $day, 'month' => $month, 'year' => $year ]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $output = $dompdf->output();
        $pdfFilepath =  'Vehicles/'.$numberPlate.'/documents/CT_LOC_'.$numberPlate.'_'.$rental->getCompany()->getName().'_'.$start.'_'.$end.'.pdf';
        $path = 'CT_LOC_'.$numberPlate.'_'.$rental->getCompany()->getName().'_'.$start.'_'.$end.'.pdf';
        file_put_contents($pdfFilepath, $output);

        $allLVDocuments = $this->getDoctrine()->getRepository(LVehiclesDocuments::class);
        $document = $allLVDocuments->findOneBy(array('vehicle' => $rental->getVehicle()->getId(), 'dateCreated'=> $date, 'path' => $path));

        if(!isset($document)){
            $documentsUpload = new LVehiclesDocuments();
            $date = new DateTime();

            $documentsUpload->setDateCreated($date);
            $documentsUpload->setPath($path);
            $documentsUpload->setVehicle($rental->getVehicle());

            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->persist($documentsUpload);
            $entitymanager->flush();
        }else{
            $document->setDateCreated($date);
            $document->setPath($path);
            $document->setVehicle($rental->getVehicle());

            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->persist($document);
            $entitymanager->flush();
        }

        return $this->redirect('/'.$pdfFilepath);
    }
}