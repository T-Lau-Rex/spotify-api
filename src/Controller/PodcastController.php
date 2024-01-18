<?php

namespace App\Controller;

use App\Entity\Podcast;
use App\Entity\Capitulo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class PodcastController extends AbstractController
{

    public function podcasts(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod("GET")) 
        {
            $podcasts = $this->getDoctrine()
                ->getRepository(Podcast::class)
                ->findAll();

            $podcasts = $serializer->serialize(
                $podcasts,
                'json',
                ['groups' => ['podcast']]);
            
            return new Response($podcasts);
        }
    }

    public function podcast(Request $request, SerializerInterface $serializer)
    {
        $id = $request->get('id');

        $podcast = $this->getDoctrine()
            ->getRepository(Podcast::class)
            ->findOneBy(['id' => $id]);

        if ($request->isMethod("GET"))
        {
            $podcast = $serializer->serialize(
                $podcast,
                'json',
                ['groups' => ['podcast']]
            );

            return new Response($podcast);
        }
    }

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
                ['groups' => ['capitulo', 'podcast']]
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