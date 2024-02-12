<?php

namespace App\Controller;

use App\Entity\AnyadeCancionPlaylist;
use App\Entity\Cancion;
use App\Entity\Playlist;
use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class CancionController extends AbstractController
{
    public function canciones(SerializerInterface $serializer)
    {
        // GET
        $canciones = $this->getDoctrine()
            ->getRepository(Cancion::class)
            ->findAll();
        
        $canciones = $serializer->serialize(
            $canciones,
            'json',
            ['groups' => ['cancion', 'album', 'artista_album']]
        );
        return new Response($canciones);
    }
    
    public function cancion(Request $request, SerializerInterface $serializer)
    {
        // GET 
        $id = $request->get("id");

        $cancion = $this->getDoctrine()
            ->getRepository(Cancion::class)
            ->findOneBy(['id' => $id]);

        $cancion = $serializer->serialize(
            $cancion,
            'json',
            ['groups' => ['cancion', 'album']]
        );
        return new Response($cancion);
    }

    public function canciones_playlist(Request $request, SerializerInterface $serializer)
    {
        // GET 
        $id = $request->get('id');

        $playlist = $this->getDoctrine()
            ->getRepository(Playlist::class)
            ->findOneBy(['id' => $id]);

        $tituloPlaylist = $playlist->getTitulo();
        $usuario = $playlist->getUsuario();
        $usuario_id = $usuario->getId();

        $anyadeCancion = $this->getDoctrine()
            ->getRepository(AnyadeCancionPlaylist::class)
            ->findBy(['playlist' => $id]);

        $data = [
            'Titulo Playlist' => $tituloPlaylist,
            'Usuario' => $usuario_id,
            'Canciones' => $anyadeCancion,
        ];

        $data = $serializer->serialize(
            $data,
            'json',
            ['groups' => ['anyade_cancion_playlist', 'cancion']]);

        return new Response($data);
    }

    public function cancion_playlist(Request $request, SerializerInterface $serializer)
    {
        // POST

        $id_playlist = $request->get('id_playlist');
        $id_cancion = $request->get('id_cancion');
        
        $playlist = $this->getDoctrine()
            ->getRepository(Playlist::class)
            ->findOneBy(['id' => $id_playlist]);
        
        $cancion = $this->getDoctrine()
            ->getRepository(Cancion::class)
            ->findOneBy(['id' => $id_cancion]);

        if ($request->isMethod('POST'))
        {
            $id_usuario = $playlist->getUsuario();

            $usuario = $this->getDoctrine()
                ->getRepository(Usuario::class)
                ->findOneBy(['id' => $id_usuario]);

            $anyadeCancion = new AnyadeCancionPlaylist();
            
            $anyadeCancion->setUsuario($usuario);
            $anyadeCancion->setPlaylist($playlist);
            $anyadeCancion->setCancion($cancion);
            
            $this->getDoctrine()->getManager()->persist($anyadeCancion);
            $this->getDoctrine()->getManager()->flush();

            $anyadeCancion = $serializer->serialize(
                $anyadeCancion,
                'json',
                ['groups' => ['anyade_cancion_playlist', 'cancion']]
            );
            return new Response($anyadeCancion);
        };
        
        // DELELE
        if ($request->isMethod('DELETE'))
        {
            $usuario = $playlist->getUsuario();
            
            $anyadeCancion = $this->getDoctrine()
                ->getRepository(AnyadeCancionPlaylist::class)
                ->findOneBy(['playlist' => $id_playlist, 'cancion' => $id_cancion, 'usuario' => $usuario]);

            $anyadeCancionDel = clone $anyadeCancion;
            
            $this->getDoctrine()->getManager()->remove($anyadeCancion);
            $this->getDoctrine()->getManager()->flush();
            
            $anyadeCancionDel = $serializer->serialize(
                $anyadeCancionDel,
                'json',
                ['groups' => ['anyade_cancion_playlist', 'cancion']]
            );
            return new Response($anyadeCancionDel);
        }
        return new JsonResponse(['msg' => $request->getMethod() . ' not allowed']);
    }
}
