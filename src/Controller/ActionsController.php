<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Meals;
use App\Entity\Couplings;
use App\Entity\EggLaying;
use App\Entity\Notes;
use App\Entity\Moults;
use App\Entity\Habitat;
use App\Entity\Animals;

/**
 * @Route("/api/user/", name="api_")
 */
class ActionsController extends AbstractController
{
    /**
     * @Route("me/animal/{qrcode}/addMeal", name="add_meal")
     */
    public function addMeal(Request $request, string $qrcode) {
        
        $user = $this->getUser();

        if (!$user) {
            throw new \Exception("Vous n'êtes pas connecté");
        }

        $date = (string) $request->request->get('date');
        $quantity = (string) $request->request->get('quantity');
        $prey = (string) $request->request->get('prey');
        $weight = (string) $request->request->get('weight');
        $comment = (string) $request->request->get('comment');

        $animal = $this->getDoctrine()->getRepository(Animals::class)->findOneBy(['qrcode' => $qrcode]);
        $meal = new Meals;

        $meal->setDate($date);
        $meal->setQuantity($quantity);
        $meal->setPrey($prey);
        $meal->setWeight($weight);
        $meal->setComment($comment);
        $meal->setAnimal($animal);

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($meal);
        
        $manager->flush();
        
        return $this->json([
            'meal created'
        ]);

    }

    /**
     * @Route("me/animal/{qrcode}/addHabitat", name="add_habitat")
     */
    public function addHabitat(Request $request, string $qrcode) {
        
        $user = $this->getUser();

        if (!$user) {
            throw new \Exception("Vous n'êtes pas connecté");
        }

        $date = (string) $request->request->get('date');
        $comment = (string) $request->request->get('comment');

        $animal = $this->getDoctrine()->getRepository(Animals::class)->findOneBy(['qrcode' => $qrcode]);
        $habitat = new Habitat;

        $habitat->setDate($date);
        $habitat->setComment($comment);
        $habitat->setAnimal($animal);

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($habitat);
        
        $manager->flush();
        
        return $this->json([
            'habitat action created'
        ]);

    }

    /**
     * @Route("me/animal/{qrcode}/addMoults", name="add_moults")
     */
    public function addMoults(Request $request, string $qrcode) {
        
        $user = $this->getUser();

        if (!$user) {
            throw new \Exception("Vous n'êtes pas connecté");
        }

        $date = (string) $request->request->get('date');
        $comment = (string) $request->request->get('comment');
        $length = (string) $request->request->get('length');


        $animal = $this->getDoctrine()->getRepository(Animals::class)->findOneBy(['qrcode' => $qrcode]);
        $moults = new Moults;

        $moults->setDate($date);
        $moults->setLength($length);
        $moults->setComment($comment);
        $moults->setAnimal($animal);

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($moults);
        
        $manager->flush();
        
        return $this->json([
            'moult created'
        ]);

    }

    /**
     * @Route("me/animal/{qrcode}/addCouplings", name="add_couplings")
     */
    public function addCouplings(Request $request, string $qrcode) {
        
        $user = $this->getUser();

        if (!$user) {
            throw new \Exception("Vous n'êtes pas connecté");
        }

        $date = (string) $request->request->get('date');
        $comment = (string) $request->request->get('comment');
        $companion = (string) $request->request->get('companion');


        $animal = $this->getDoctrine()->getRepository(Animals::class)->findOneBy(['qrcode' => $qrcode]);
        $couplings = new Couplings;

        $couplings->setDate($date);
        $couplings->setCompanion($companion);
        $couplings->setComment($comment);
        $couplings->setAnimal($animal);

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($couplings);
        
        $manager->flush();
        
        return $this->json([
            'couple created'
        ]);

    }

    /**
     * @Route("me/animal/{qrcode}/addLayings", name="add_layings")
     */
    public function addLayings(Request $request, string $qrcode) {
        
        $user = $this->getUser();

        if (!$user) {
            throw new \Exception("Vous n'êtes pas connecté");
        }

        $date = (string) $request->request->get('date');
        $comment = (string) $request->request->get('comment');
        $quantity = (string) $request->request->get('quantity');


        $animal = $this->getDoctrine()->getRepository(Animals::class)->findOneBy(['qrcode' => $qrcode]);
        $layings = new EggLaying;

        $layings->setDate($date);
        $layings->setQuantity($quantity);
        $layings->setComment($comment);
        $layings->setAnimal($animal);

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($layings);
        
        $manager->flush();
        
        return $this->json([
            'laying created'
        ]);

    }

    /**
     * @Route("me/animal/{qrcode}/addNotes", name="add_notes")
     */
    public function addNotes(Request $request, string $qrcode) {
        
        $user = $this->getUser();

        if (!$user) {
            throw new \Exception("Vous n'êtes pas connecté");
        }

        $date = (string) $request->request->get('date');
        $comment = (string) $request->request->get('comment');


        $animal = $this->getDoctrine()->getRepository(Animals::class)->findOneBy(['qrcode' => $qrcode]);
        $note = new Notes;

        $note->setDate($date);
        $note->setComment($comment);
        $note->setAnimal($animal);

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($note);
        
        $manager->flush();
        
        return $this->json([
            'note created'
        ]);

    }
}
