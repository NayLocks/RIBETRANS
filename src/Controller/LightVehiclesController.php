<?php

namespace App\Controller;

use App\Entity\LightVehicles;
use App\Entity\LVehiclesDocuments;
use App\Entity\LVehiclesRentals;
use App\Form\DocumentsFormType;
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

        $form = $this->createForm(DocumentsFormType::class);
        $form->handleRequest($request);

        if(empty($rental)){
            $rental[0]['price'] = 0;
            $rental[0]['startRental'] = '1900-01-01';
            $rental[0]['endRental'] = '1900-01-01';
            $rental[0]['status'] = 0;
        }

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

//    /**
//     * @Route("/Vehicles/leger/nouveau/", name="ficheVehiculeNouveau")
//     */
//    public function ficheVehiculeNouveau(Request $request)
//    {
//        $vehicule = new Vehicule();
//
//        $form = $this->createForm(LightVehiculeFormType::class);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
////            $filename = 'Vehicles/'.$immatriculation.'/';
////            if (is_dir($filename)) {
////                $files = glob("Vehicles/".$immatriculation."/*.*");/* $files pour "lister" les fichiers - Mise en place de *.* pour dire que ce dossier contient une extension (par exemple .jpg, .php, etc... */
////                $compteur = count($files);
////                $compteur++;
////                $brochureFile = $form->get('photo')->getData();
////                if ($brochureFile) {
////                    $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
////                    $newFilename = $immatriculation.'-'.$compteur.'.'.$brochureFile->guessExtension();
////
////                    try { $brochureFile->move($this->getParameter('img_vehicules')."/".$immatriculation, $newFilename); } catch (FileException $e) {}
////                }
////            } else {
////                mkdir("Vehicles/".$immatriculation);
////                mkdir("Vehicles/".$immatriculation."/documents");
////                $brochureFile = $form->get('photo')->getData();
////                if ($brochureFile) {
////                    $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
////                    $newFilename = $immatriculation.'-1.'.$brochureFile->guessExtension();
////
////                    try { $brochureFile->move($this->getParameter('img_vehicules')."/".$immatriculation, $newFilename); } catch (FileException $e) {}
////                }
////            }
//
//            $vehicule->setImmatriculation($form->get('immatriculation')->getData());
//            $vehicule->setSociete($form->get('societe')->getData());
//            $vehicule->setMiseCirculation($form->get('miseCirculation')->getData());
//            $vehicule->setEntreeParc($form->get('entreeParc')->getData());
//            $vehicule->setMarque($form->get('marque')->getData());
//            $vehicule->setCategorie($form->get('categorie')->getData());
//            $vehicule->setCarrosserie($form->get('carrosserie')->getData());
//            $vehicule->setNoParc(00);
//            $vehicule->setPoids(00);
//            $vehicule->setCtLoc(0);
//            $vehicule->setIsArchived(0);
//
//            $entitymanager = $this->getDoctrine()->getManager();
//            $entitymanager->persist($vehicule);
//            $entitymanager->flush();
//
//            return $this->redirectToRoute('ficheVehicule', array('immatriculation' => $form->get('immatriculation')->getData()));
//        }
//        return $this->render('LightVehicles/ficheVehiculeNouveau.html.twig', ['form' => $form->createView()]);
//    }

//    /**
//     * @Route("/Vehicles/leger/modification/{numberPlate}", name="cardLightVehicleEdit")
//     */
//    public function ficheVehiculeModif(Request $request, $numberPlate)
//    {
//        $allLightVehicles = $this->getDoctrine()->getRepository(LightVehicles::class);
//        $lightVehicle = $allLightVehicles->findOneBy(array('numberPlate' => $numberPlate ));
//
//        $allPhotos = $this->getDoctrine()->getRepository(LVehiclePictures::class);
//        $photo = $allPhotos->findBy(array('lightVehicle' => $lightVehicle->getId()));
//
//        $allRentals = $this->getDoctrine()->getRepository(LVehicleRentals::class);
//        $rentals = $allRentals->rentalsVehicle($lightVehicle->getId());
//        $rental = $allRentals->rentalLastVehicle($lightVehicle->getId());
//
//
//
//        $form = $this->createForm(LightVehiculeFormType::class, $lightVehicle);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//
//            $lightVehicle->setNumberPlate($form->get("numberPlate")->getData());
//            $lightVehicle->setCompany($form->get("company")->getData());
//            $lightVehicle->setPutCirculation($form->get("putCirculation")->getData());
//            $lightVehicle->setEntrancePark($form->get("entrancePark")->getData());
//            $lightVehicle->setExitPark($form->get("exitPark")->getData());
//            $lightVehicle->setBrand($form->get("brand")->getData());
//            $lightVehicle->setCategory($form->get("category")->getData());
//            $lightVehicle->setBody($form->get("body")->getData());
//
//            $lightVehicle->setPneusMarqueAV($form->get("pneusMarqueAV")->getData());
//            $lightVehicle->setPneusMarqueAR($form->get("pneusMarqueAR")->getData());
//            $lightVehicle->setPneusDimensionAV($form->get("pneusDimensionAV")->getData());
//            $lightVehicle->setPneusDimensionAR($form->get("pneusDimensionAR")->getData());
//
//            $lightVehicle->setIsArchive(0);
//
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->persist($lightVehicle);
//            $entityManager->flush();
//
//            return $this->redirectToRoute('cardLightVehicle', array('numberPlate' => $lightVehicle->getNumberPlate()));
//        }
//        return $this->render('LightVehicles/cardLightVehicleEdit.html.twig', ['form' => $form->createView(), 'vehicle' => $lightVehicle, 'pictures' => $photo, 'rentals' => $rentals, 'rental' => $rental[0]]);
//    }

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
