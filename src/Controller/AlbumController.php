<?php

namespace App\Controller;

use App\Entity\Album;
use App\Entity\Artista;
use App\Entity\Cancion;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class AlbumController extends AbstractController
{
    // path: /albums | GET
    public function albums(SerializerInterface $serializer)
    {
        $albums = $this->getDoctrine()
            ->getRepository(Album::class)
            ->findAll();
            
        $albums = $serializer->serialize(
            $albums,
            'json',
            ['groups' => ['album', 'artista']]
        );
        return new Response($albums);
    }

    // path: /album/{id} | GET
    public function album(Request $request, SerializerInterface $serializer)
    {
        $id = $request->get('id');

        $album = $this->getDoctrine()
            ->getRepository(Album::class)
            ->findOneBy(['id' => $id]);
        
        $artistaId = $album->getArtista();
        
        $artista = $this->getDoctrine()
            ->getRepository(Artista::class)
            ->findOneBy(['id' => $artistaId]);

        $artistaNombre = $artista->getNombre();

        $data = [
            'Artista' => $artistaNombre,
            'Album' => $album
        ];
        
        $album = $serializer->serialize(
            $data,
            'json',
            ['groups' => ['album']]
        );
        return new Response($album);
    }

    // path: /album/{id}/canciones | GET
    public function album_canciones(Request $request, SerializerInterface $serializer)
    {
        $id = $request->get('id');
        $canciones = $this->getDoctrine()
            ->getRepository(Cancion::class)
            ->findBy(['album' => $id]);

        $album = $this->getDoctrine()
            ->getRepository(Album::class)
            ->findOneBy(['id' => $id]);
        
        $tituloAlbum = $album->getTitulo();

        $data = [
            'Album' => $tituloAlbum,
            'Canciones' => $canciones
        ];

        $canciones = $serializer->serialize(
            $data,
            'json',
            ['groups' => ['cancion']]
        );
        return new Response($canciones);
    }
}
