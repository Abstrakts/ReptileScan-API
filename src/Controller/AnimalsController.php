<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Animals;
use App\Entity\Categories;
use PHPUnit\Util\Json;

/**
 * @Route("/api/user", name="api_")
 */
class AnimalsController extends AbstractController
{
    /**
     * @Route("/me/animal/new", name="create_animal")
     */
    public function createAnimal(Request $request)
    {
        $user = $this->getUser();


        if (!$user) {
            throw new \Exception("Vous n'êtes pas connecté");
        }

        $animal = new Animals;


        $picture = (string) $request->request->get('picture');
        $name = (string) $request->request->get('name');
        $species = (string) $request->request->get('species');
        $morph = (string) $request->request->get('morph');
        $categoryId = (string) $request->request->get('category');
        $picture = (string) $request->request->get('picture');
        $birthday = (string) $request->request->get('birthday');
        $comment = (string) $request->request->get('comment');
        $sexe = (string) $request->request->get('sexe');

        $category = $this->getDoctrine()->getRepository(Categories::class)->findOneBy(['id' => $categoryId]);

        $animal->setPicture($picture);
        $animal->setName($name);
        $animal->setSpecies($species);
        $animal->setMorph($morph);
        $animal->setUser($user);
        $animal->setSexe($sexe);
        $animal->setCategory($category);
        $animal->setBirthday($birthday);
        $animal->setComment($comment);
        $qrcode = date('my') . uniqid() . '-rscan';
        $animal->setQrcode($qrcode);

        $manager = $this->getDoctrine()->getManager();

        $manager->persist($animal);

        $manager->flush();

        return $this->json([
            'animal create with QRcode'
        ]);
    }

    /**
     * @Route("/me/animal/{id}/remove", name="remove_animal")
     */
    public function removeAnimal($id)
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

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($animal);
        $manager->flush();

        return $this->json([
            'animal removed'
        ]);
    }

    /**
     * @Route("/me/animals", name="animals_list")
     */
    public function animalsList()
    {
        $user = $this->getUser();

        if (!$user) {
            throw new \Exception("Vous n'êtes pas connecté");
        }

        $animals = $user->getAnimals();
        $response = [];

        foreach ($animals as $animal) {
            $response[] = [
                "id" => $animal->getId(),
                "name" => $animal->getName(),
                "birthday" => $animal->getBirthday(),
                "species" => $animal->getSpecies(),
                "morph" => $animal->getMorph(),
                "sexe" => $animal->getSexe(),
                "picture" => $animal->getPicture(),
                "qrcode" => $animal->getQrcode(),
                "category" => $animal->getCategory()->getId()
            ];
        }

        return $this->json($response);
    }

    /**
     * @Route("/me/animal/{id}", name="animal_detail")
     */
    public function animalDetail(string $id)
    {

        $user = $this->getUser();

        $animal = $this->getDoctrine()
            ->getRepository(Animals::class)
            ->findOneBy(([
                'qrcode' => $id,
                'user' => $user
            ]));

        if (!$user) {
            throw new \Exception("Vous n'êtes pas connecté");
        }

        if (!$animal) {
            throw new \Exception("Cet animal ne vous appartient pas");
        }

        $response = [
            "id" => $animal->getId(),
            "name" => $animal->getName(),
            "birthday" => $animal->getBirthday(),
            "species" => $animal->getSpecies(),
            "morph" => $animal->getMorph(),
            "sexe" => $animal->getSexe(),
            "picture" => $animal->getPicture(),
            "qrcode" => $animal->getQrcode(),
            "comment" => $animal->getComment()
        ];

        return $this->json($response);
    }

    /**
     * @Route("/me/animal/{id}/edit", name="animal_edit")
     */
    public function editAnimal(Request $request, $id)
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

        $picture = (string) $request->request->get('picture');
        $name = (string) $request->request->get('name');
        $species = (string) $request->request->get('species');
        $morph = (string) $request->request->get('morph');
        $categoryId = (string) $request->request->get('category');
        $picture = (string) $request->request->get('picture');
        $birthday = (string) $request->request->get('birthday');
        $comment = (string) $request->request->get('comment');
        $sexe = (string) $request->request->get('sexe');

        $category = $this->getDoctrine()->getRepository(Categories::class)->findOneBy(['id' => $categoryId]);

        $animal->setPicture($picture);
        $animal->setName($name);
        $animal->setSpecies($species);
        $animal->setMorph($morph);
        //$animal->setUser($user);
        $animal->setSexe($sexe);
        $animal->setCategory($category);
        $animal->setBirthday($birthday);
        $animal->setComment($comment);
        //$qrcode = date('dmy') . '-' . uniqid() . '-rscan';
        //$animal->setQrcode($qrcode);

        $manager = $this->getDoctrine()->getManager();

        $manager->persist($animal);

        $manager->flush();

        return $this->json([
            'animal edited'
        ]);
    }
}
