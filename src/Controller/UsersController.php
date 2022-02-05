<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/user/", name="api_")
 */
class UsersController extends AbstractController
{

    /**
     * @Route("me", name="user_detail")
     */
    public function index(Request $request)
    {
        $user = $this->getUser();

        if (!$user) {
            throw new \Exception("Vous n'êtes pas connecté");
        }

        $response = [
            'id' => $user->getClientId(),
            'avatar' => $user->getAvatar(),
            'firstName' => $user->getFirstname(),
            'lastName' => $user->getLastname(),
            'birthday' => $user->getBirthday(),
            'email' => $user->getEmail(),
            'phone' => $user->getPhone(),
            'address' => $user->getAddress(),
            'siret' => $user->getSiret(),
            'google_id' => $user->getGoogleId(),
            'facebook_id' => $user->getFacebookId()
        ];
        
        return $this->json($response);
    }

    /**
     * @Route("me/createProfil", name="new_profil")
     */
    public function createAddress(Request $request)
    {
        $user = $this->getUser();

        if (!$user) {
            throw new \Exception("Vous n'êtes pas connecté");
        }

        $avatar = (string) $request->request->get('avatar');
        $firstName = (string) $request->request->get('firstName');
        $lastName = (string) $request->request->get('lastName');
        //$birthday = (string) $request->request->get('birthday');
        $phone = (string) $request->request->get('phone');
        $address = (string) $request->request->get('address');
        $siret = (string) $request->request->get('siret');

        $user->setAvatar($avatar);
        $user->setFirstname($firstName);
        $user->setLastName($lastName);
        //$user->setBirthday($birthday);
        $user->setPhone($phone);
        $user->setAddress($address);
        $user->setSiret($siret);

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($user);
        $manager->flush();
        
        return $this->json(true);
    }

}
