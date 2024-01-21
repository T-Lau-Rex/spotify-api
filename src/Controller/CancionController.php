<?php

namespace App\Controller;

use App\Entity\Cancion;
use App\Entity\Playlist;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class CancionController extends AbstractController
{
    public function canciones(SerializerInterface $serializer)
    {
        // path: /canciones
        $canciones = $this->getDoctrine()
            ->getRepository(Cancion::class)
            ->findAll();
        
        $canciones = $serializer->serialize(
            $canciones,
            'json',
            ['groups' => ['cancion']]
        );
        return new Response($canciones);
    }
    
    public function cancion(Request $request, SerializerInterface $serializer)
    {
        $id = $request->get("id");

        $cancion = $this->getDoctrine()
            ->getRepository(Cancion::class)
            ->findOneBy(['id' => $id]);

        $cancion = $serializer->serialize(
            $cancion,
            'json',
            ['groups' => ['cancion']]
        );
        return new Response($cancion);
    }
    public function canciones_playlist(Request $request, SerializerInterface $serializer)
    {
        // path: /playlist/{id}/canciones
        $id = $request->get('id');

        $playlist = $this->getDoctrine()
            ->getRepository(Playlist::class)
            ->findOneBy(['id' => $id]);
        
        // $canciones = $this->getDoctrine()
        //     ->getRepository()
    }

}
