<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Animals;

/**
 * @Route("/api/user", name="api_")
 */
class SheetController extends AbstractController
{
    /**
    * @Route("/me/animal/{id}/meals", name="animal_meals")
    */
   public function animalMeals(string $id)
   {
       $user = $this->getUser();

       if (!$user) {
           throw new \Exception("Vous n'êtes pas connecté");
       }

       $animal = $this->getDoctrine()
           ->getRepository(Animals::class)
           ->findOneBy(([
               'qrcode' => $id,
               'user' => $user
           ]));

       $meals = $animal->getMeals();

       $response = [];

       foreach ($meals as $meal) {
           $response[] = [
               "id" => $meal->getId(),
               "date" => $meal->getDate(),
               "quantity" => $meal->getQuantity(),
               "prey" => $meal->getPrey(),
               "weight" => $meal->getWeight(),
               "comment" => $meal->getComment()
           ];
       }

       return $this->json($response);
   }

   /**
    * @Route("/me/animal/{id}/habitat", name="animal_habitat")
    */
   public function animalHabitat(string $id)
   {
       $user = $this->getUser();

       if (!$user) {
           throw new \Exception("Vous n'êtes pas connecté");
       }

       $animal = $this->getDoctrine()
           ->getRepository(Animals::class)
           ->findOneBy(([
               'qrcode' => $id,
               'user' => $user
           ]));

       $cage = $animal->getHabitats();

       $response = [];

       foreach ($cage as $habitat) {
           $response[] = [
               "id" => $habitat->getId(),
               "date" => $habitat->getDate(),
               "comment" => $habitat->getComment()
           ];
       }

       return $this->json($response);
   }

   /**
    * @Route("/me/animal/{id}/moults", name="animal_moults")
    */
   public function animalMoults(string $id)
   {
       $user = $this->getUser();

       if (!$user) {
           throw new \Exception("Vous n'êtes pas connecté");
       }

       $animal = $this->getDoctrine()
           ->getRepository(Animals::class)
           ->findOneBy(([
               'qrcode' => $id,
               'user' => $user
           ]));

       $moults = $animal->getMoults();

       $response = [];

       foreach ($moults as $moult) {
           $response[] = [
               "id" => $moult->getId(),
               "date" => $moult->getDate(),
               "length" => $moult->getLength(),
               "comment" => $moult->getComment()
           ];
       }

       return $this->json($response);
   }

   /**
    * @Route("/me/animal/{id}/couplings", name="animal_couplings")
    */
   public function animalCouplings(string $id)
   {
       $user = $this->getUser();

       if (!$user) {
           throw new \Exception("Vous n'êtes pas connecté");
       }

       $animal = $this->getDoctrine()
           ->getRepository(Animals::class)
           ->findOneBy(([
               'qrcode' => $id,
               'user' => $user
           ]));

       $couplings = $animal->getCouplings();

       $response = [];

       foreach ($couplings as $coupling) {
           $response[] = [
               "id" => $coupling->getId(),
               "date" => $coupling->getDate(),
               "companion" => $coupling->getCompanion(),
               "comment" => $coupling->getComment()
           ];
       }

       return $this->json($response);
   }

   /**
    * @Route("/me/animal/{id}/layings", name="animal_layings")
    */
   public function animalEggLayings(string $id)
   {
       $user = $this->getUser();

       if (!$user) {
           throw new \Exception("Vous n'êtes pas connecté");
       }

       $animal = $this->getDoctrine()
           ->getRepository(Animals::class)
           ->findOneBy(([
               'qrcode' => $id,
               'user' => $user
           ]));

       $layings = $animal->getEggLayings();

       $response = [];

       foreach ($layings as $laying) {
           $response[] = [
               "id" => $laying->getId(),
               "date" => $laying->getDate(),
               "comment" => $laying->getComment()
           ];
       }

       return $this->json($response);
   }

   /**
    * @Route("/me/animal/{id}/notes", name="animal_notes")
    */
   public function animalNotes(string $id)
   {
       $user = $this->getUser();

       if (!$user) {
           throw new \Exception("Vous n'êtes pas connecté");
       }

       $animal = $this->getDoctrine()
           ->getRepository(Animals::class)
           ->findOneBy(([
               'qrcode' => $id,
               'user' => $user
           ]));

       $notes = $animal->getNotes();

       $response = [];

       foreach ($notes as $note) {
           $response[] = [
               "id" => $note->getId(),
               "date" => $note->getDate(),
               "comment" => $note->getComment()
           ];
       }

       return $this->json($response);
   }
}
