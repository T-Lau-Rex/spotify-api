<?php

namespace App\Controller;

use App\Entity\Idioma;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class IdiomaController extends AbstractController
{
    public function idiomas(Request $request, SerializerInterface $serializer)
    {
        $idiomas = $this->getDoctrine()
            ->getRepository(Idioma::class)
            ->findAll();

        $idiomas = $serializer->serialize(
            $idiomas,
            'json',
            ['groups' => ['idioma']]
        );
        return new Response($idiomas);
    }
}
