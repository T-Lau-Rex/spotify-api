<?php

namespace App\Controller;

use App\Entity\Artista;
use App\Entity\Album;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class ArtistaController extends AbstractController {

    public function artistas(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod("GET"))
        {
            $artistas = $this->getDoctrine()
                ->getRepository(Artista::class)
                ->findAll();

            $artistas = $serializer->serialize(
                $artistas,
                'json',
                ['groups' => ['artista']]
            );

            return new Response($artistas);
        }
    }

    public function artista_albums(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET'))
        {
            $id = $request->get('id');

            $albums = $this->getDoctrine()
                ->getRepository(Album::class)
                ->findBy(['artista' => $id]);
            
            if ($albums)
            {
                $albums = $serializer->serialize(
                    $albums,
                    'json',
                    ['groups'=> ['album']]
                );
    
                return new Response($albums);
            }
            return new JsonResponse(['msg' => 'Artista not found'], 404);
        }
    }

    public function artista_album(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET'))
        {
            $id_artista = $request->get('id_artista');
            $id_album = $request->get('id_album');

            $album = $this->getDoctrine()
                ->getRepository(Album::class)
                ->findOneBy(['artista' => $id_artista, 'id' => $id_album]);
            
            if ($album)
            {
                $album = $serializer->serialize(
                    $album,
                    'json',
                    ['groups'=> ['album']]
                );
    
                return new Response($album);
            }
            return new JsonResponse(['msg'=> 'Album not found'], 404);
        }
    }

}
