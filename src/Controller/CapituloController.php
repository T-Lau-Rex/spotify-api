<?php

namespace App\Controller;

use App\Entity\Capitulo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class CapituloController extends AbstractController
{
    public function podcast_capitulos(Request $request, SerializerInterface $serializer)
    {
        $id = $request->get('id');

        $capitulos = $this->getDoctrine()
            ->getRepository(Capitulo::class)
            ->findBy(['podcast' => $id]);

        if ($request->isMethod("GET"))
        {
            $capitulos = $serializer->serialize(
                $capitulos,
                'json',
                ['groups' => ['capitulo']]
            );
    
            return new Response($capitulos);
        }
    }

    public function podcast_capitulo(Request $request, SerializerInterface $serializer)
    {
        $id_podcast = $request->get('id_podcast');
        $id_capitulo = $request->get('id_capitulo');

        $capitulo = $this->getDoctrine()
            ->getRepository(Capitulo::class)
            ->findOneBy(['podcast' => $id_podcast, 'id' => $id_capitulo]);

        if ($request->isMethod("GET"))
        {
            $capitulo = $serializer->serialize(
                $capitulo,
                'json',
                ['groups' => ['capitulo']]
            );
    
            return new Response($capitulo);
        }
    }
}