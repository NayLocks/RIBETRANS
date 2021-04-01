<?php

namespace App\Controller;

use App\Entity\LightVehicles;
use App\Entity\LVehiclesDocuments;
use App\Entity\LVehiclesRentals;
use App\Form\DocumentsFormType;
use App\Form\LightVehiclesFormType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\String\Slugger\SluggerInterface;

class LightVehiclesController extends AbstractController
{
    /**
     * @Route("/vehicules/leger/visualisation/{numberPlate}", name="cardLightVehicle")
     */
    public function cardLightVehicle(Request $request, $numberPlate)
    {
        $allLightVehicles = $this->getDoctrine()->getRepository(LightVehicles::class);
        $lightVehicle = $allLightVehicles->findOneBy(array('numberPlate' => $numberPlate ));

        $allRentals = $this->getDoctrine()->getRepository(LVehiclesRentals::class);
        $rental = $allRentals->rentalLastVehicle($lightVehicle->getId());

        $files = glob("Vehicles/".$numberPlate."/*.*");
        $compteur = count($files);


        if(empty($rental)){
            $rental[0]['price'] = 0;
            $rental[0]['startRental'] = '1900-01-01';
            $rental[0]['endRental'] = '1900-01-01';
            $rental[0]['status'] = 0;
        }

        $form = $this->createForm(DocumentsFormType::class);
        $form->handleRequest($request);

        $documentsUpload = new LVehiclesDocuments();
        $date = new DateTime();

        if ($form->isSubmitted() && $form->isValid()) {
            $documentFile = $form->get('document')->getData();
            if ($documentFile) {
                $originalFilename = pathinfo($documentFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $form->get('name')->getData().'.'.$documentFile->guessExtension();

                try { $documentFile->move($this->getParameter('docVehicules')."/".$numberPlate."/documents", $newFilename); } catch (FileException $e) {}
            }
            $documentsUpload->setDateCreated($date);
            $documentsUpload->setPath($newFilename);
            $documentsUpload->setVehicle($lightVehicle);

            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->persist($documentsUpload);
            $entitymanager->flush();
            return $this->redirectToRoute('cardLightVehicle', array('numberPlate' => $numberPlate));
        }
        return $this->render('LightVehicles/cardLightVehicle.html.twig', ['vehicle' => $lightVehicle, "nbPictures" => $compteur, 'form' => $form->createView(), 'rental' => $rental[0]]);
    }

    /**
     * @Route("/Vehicles/leger/nouveau}", name="cardLightVehicleAdd")
     */
    public function ficheVehiculeAjout(Request $request)
    {

        $form = $this->createForm(LightVehiclesFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            mkdir("Vehicles/".$form->get('numberPlate')->getData(), 0700);
            mkdir("Vehicles/".$form->get('numberPlate')->getData()."/documents", 0700);

            $lightVehicle = new LightVehicles();

            $lightVehicle->setNumberPlate($form->get('numberPlate')->getData());
            $lightVehicle->setCompany($form->get('company')->getData());
            $lightVehicle->setPutCirculation($form->get('putCirculation')->getData());
            $lightVehicle->setBody($form->get('body')->getData());
            $lightVehicle->setBodyType($form->get('bodyType')->getData());
            $lightVehicle->setBrand($form->get('brand')->getData());
            $lightVehicle->setType($form->get('type')->getData());
            $lightVehicle->setCategory($form->get('category')->getData());
            $lightVehicle->setKind($form->get('kind')->getData());

            $lightVehicle->setNbPlaces($form->get('nbPlaces')->getData());
            $lightVehicle->setEnergy($form->get('energy')->getData());
            $lightVehicle->setPower($form->get('power')->getData());
            $lightVehicle->setWeight($form->get('weight')->getData());
            $lightVehicle->setEmptyWeight($form->get('emptyWeight')->getData());
            $lightVehicle->setKm($form->get('km')->getData());

            $lightVehicle->setEntrancePark($form->get('entrancePark')->getData());
            $lightVehicle->setExitPark($form->get('exitPark')->getData());

            $lightVehicle->setTireBrandsAV($form->get('tireBrandsAV')->getData());
            $lightVehicle->setTireSizeAV($form->get('tireSizeAV')->getData());
            $lightVehicle->setTireBrandsAR($form->get('tireBrandsAR')->getData());
            $lightVehicle->setTireSizeAR($form->get('tireSizeAR')->getData());
            $lightVehicle->setIsArchived(0);

            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->persist($lightVehicle);
            $entitymanager->flush();

            return $this->redirectToRoute('cardLightVehicle', array('numberPlate' => $lightVehicle->getNumberPlate()));
        }
        return $this->render('LightVehicles/cardLightVehicleAdd.html.twig', ['form' => $form->createView()]);
    }


    /**
     * @Route("/Vehicles/leger/modification/{numberPlate}", name="cardLightVehicleEdit")
     */
    public function ficheVehiculeModif(Request $request, $numberPlate)
    {
        $allLightVehicles = $this->getDoctrine()->getRepository(LightVehicles::class);
        $lightVehicle = $allLightVehicles->findOneBy(array('numberPlate' => $numberPlate));

        $files = glob("Vehicles/".$numberPlate."/*.*");
        $compteur = count($files);

        if(empty($rental)){
            $rental[0]['price'] = 0;
            $rental[0]['startRental'] = '1900-01-01';
            $rental[0]['endRental'] = '1900-01-01';
            $rental[0]['status'] = 0;
        }

        $form = $this->createForm(LightVehiclesFormType::class, $lightVehicle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $lightVehicle->setNumberPlate($form->get('numberPlate')->getData());
            $lightVehicle->setCompany($form->get('company')->getData());
            $lightVehicle->setPutCirculation($form->get('putCirculation')->getData());
            $lightVehicle->setBody($form->get('body')->getData());
            $lightVehicle->setBodyType($form->get('bodyType')->getData());
            $lightVehicle->setBrand($form->get('brand')->getData());
            $lightVehicle->setType($form->get('type')->getData());
            $lightVehicle->setCategory($form->get('category')->getData());
            $lightVehicle->setKind($form->get('kind')->getData());

            $lightVehicle->setNbPlaces($form->get('nbPlaces')->getData());
            $lightVehicle->setEnergy($form->get('energy')->getData());
            $lightVehicle->setPower($form->get('power')->getData());
            $lightVehicle->setWeight($form->get('weight')->getData());
            $lightVehicle->setEmptyWeight($form->get('emptyWeight')->getData());
            $lightVehicle->setKm($form->get('km')->getData());

            $lightVehicle->setEntrancePark($form->get('entrancePark')->getData());
            $lightVehicle->setExitPark($form->get('exitPark')->getData());

            $lightVehicle->setTireBrandsAV($form->get('tireBrandsAV')->getData());
            $lightVehicle->setTireSizeAV($form->get('tireSizeAV')->getData());
            $lightVehicle->setTireBrandsAR($form->get('tireBrandsAR')->getData());
            $lightVehicle->setTireSizeAR($form->get('tireSizeAR')->getData());

            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->persist($lightVehicle);
            $entitymanager->flush();

            return $this->redirectToRoute('cardLightVehicle', array('numberPlate' => $lightVehicle->getNumberPlate()));
        }
        return $this->render('LightVehicles/cardLightVehicleEdit.html.twig', ['vehicle' => $lightVehicle, "nbPictures" => $compteur, 'form' => $form->createView()]);
    }

    /**
     * @Route("/vehicule/leger/document/suppression/{numberPlate}/{document}", name="deleteLVDocument")
     */
    public function deleteDocument(Request $request, $numberPlate, $document)
    {
        $allDocuments = $this->getDoctrine()->getRepository(LVehiclesDocuments::class);
        $document = $allDocuments->find($document);

        unlink('Vehicles/'.$numberPlate.'/documents/'.$document->getPath());

        $entitymanager = $this->getDoctrine()->getManager();
        $entitymanager->remove($document);
        $entitymanager->flush();

        return $this->redirectToRoute('cardLightVehicle', array('numberPlate' => $numberPlate));
    }

//    /**
//     * @Route("/vehicule/leger/photos/suppression/{numberPlate}/{picture}", name="deletePicture")
//     */
//    public function deletePicture(Request $request, $numberPlate, $picture)
//    {
//        $allPictures = $this->getDoctrine()->getRepository(LVehiclePictures::class);
//        $picture = $allPictures->find($picture);
//
//        unlink('Vehicles/'.$numberPlate.'/'.$picture->getPath());
//
//        return $this->redirectToRoute('cardLightVehicle', array('numberPlate' => $numberPlate));
//    }
}
