<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Animals;
use App\Entity\Notifications;

/**
 * @Route("/api/user/", name="api_")
 */
class NotificationsController extends AbstractController
{
    /**
     * @Route("me/animal/{qrcode}/notif/new", name="new_notification")
     */
    public function createNotification(Request $request, string $qrcode)
    {
        $user = $this->getUser();

        if (!$user) {
            throw new \Exception("vous n'êtes pas connecté");
        }

        $title = (string) $request->request->get('title');
        $timer = (int) $request->request->get('timer');
        
        $animal = $this->getDoctrine()->getRepository(Animals::class)->findOneBy(['qrcode' => $qrcode]);
        $notification = new Notifications;

        $notification->setTitle($title);
        $notification->setTimer($timer);
        $notification->setActive(1);
        $notification->setAnimal($animal);

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($notification);
        //dump($notification);
        //die;
        $manager->flush();

        return $this->json([
            'Notification created'
        ]);

    }

    /**
     * @Route("me/animal/{qrcode}/notif/{id}/remove", name="remove_notification")
     */
    public function removeNotification($id, $qrcode)
    {
        $user = $this->getUser();

        if (!$user) {
            throw new \Exception("vous n'êtes pas connecté");
        }

        $animal = $this->getDoctrine()
            ->getRepository(Animals::class)
            ->findOneBy(([
                'qrcode' => $qrcode,
                'user' => $user
            ]));

        $notification = $this->getDoctrine()
            ->getRepository(Notifications::class)
            ->findOneBy(([
                'id' => $id,
                'animal' => $animal
            ]));

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($notification);
        $manager->flush();

        return $this->json([
            'Notification removed'
        ]);

    }

    /**
     * @Route("me/animal/{qrcode}/notif/{id}/disable", name="disable_notification")
     */
    public function disableNotification(Request $request, $id, $qrcode)
    {
        $user = $this->getUser();

        if (!$user) {
            throw new \Exception("vous n'êtes pas connecté");
        }

        $animal = $this->getDoctrine()
            ->getRepository(Animals::class)
            ->findOneBy(([
                'qrcode' => $qrcode,
                'user' => $user
            ]));

        $active = (bool) $request->request->get('active');

        $notification = $this->getDoctrine()
            ->getRepository(Notifications::class)
            ->findOneBy(([
                'id' => $id,
                'animal' => $animal
            ]));

        $notification->setActive(0);

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($notification);
        $manager->flush();

        return $this->json([
            'Notification disabled'
        ]);

    }
}
