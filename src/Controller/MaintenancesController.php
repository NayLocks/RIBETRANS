<?php

namespace App\Controller;

use App\Entity\LightVehicles;
use App\Entity\LVehiclesMaintenances;
use App\Form\LVMaintenanceFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class MaintenancesController extends AbstractController
{
    /**
     * @Route("/entretien/nouveau/{numberPlate}", name="newMaintenanceLV")
     */
    public function newMaintenanceLV(Request $request, $numberPlate)
    {
        $allLightVehicles = $this->getDoctrine()->getRepository(LightVehicles::class);
        $vehicle = $allLightVehicles->findOneBy(array('numberPlate' => $numberPlate));

        $form = $this->createForm(LVMaintenanceFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $maintenance = new LVehiclesMaintenances();

            $maintenance->setCompany($vehicle->getCompany());
            $maintenance->setVehicle($vehicle);
            $maintenance->setDriver($form->get('driver')->getData());
            $maintenance->setIntervenant($form->get('intervenant')->getData());
            $maintenance->setEntrance($form->get('entrance')->getData());
            $maintenance->setExitRT($form->get('exitRT')->getData());
            $maintenance->setKm($form->get('km')->getData());
            $maintenance->setIntervention($form->get('intervention')->getData());
            $maintenance->setQuantite($form->get('quantite')->getData());
            $maintenance->setPriceUnit($form->get('priceUnit')->getData());
            $maintenance->setTotal($form->get('total')->getData());

            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->persist($maintenance);
            $entitymanager->flush();

            exit();

            return $this->redirectToRoute('cardLightVehicle', array('numberPlate' => $numberPlate));
        }

        return $this->render('LightVehicles/maintenance.html.twig', ['form' => $form->createView(), 'vehicle' => $vehicle]);
    }
}