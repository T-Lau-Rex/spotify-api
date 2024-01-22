<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Entity\Playlist;
use App\Entity\Activa;
use App\Entity\Eliminada;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class PlaylistController extends AbstractController
{

    public function playlists(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod("GET")) 
        {
            $playlists = $this->getDoctrine()
                ->getRepository(Activa::class)
                ->findAll();
            
            $playlists = $serializer->serialize(
                $playlists,
                'json',
                ['groups' => ['activa', 'playlist']]
            );

            return new Response($playlists);
        }
    }

    public function playlist(Request $request, SerializerInterface $serializer)
    {
        $id = $request->get('id');

        $playlist = $this->getDoctrine()
            ->getRepository(Activa::class)
            ->findOneBy(['playlist' => $id]);

        if ($request->isMethod('GET'))
        {   
            $playlist = $serializer->serialize(
                $playlist,
                'json',
                ['groups' => ['activa', 'playlist']]
            );

            return new Response($playlist);
        }
    }

    public function usuario_playlists(Request $request, SerializerInterface $serializer)
    {   
        $id = $request->get('id');

        if ($request->isMethod('GET'))
        {
            $playlists = $this->getDoctrine()
                ->getRepository(Playlist::class)
                ->findOneBy(['usuario'=> $id]);

            $playlists = $serializer->serialize(
                $playlists,
                'json',
                ['groups'=> ['playlist']]
            );

            return new Response($playlists);
        }

        if ($request->isMethod('POST'))
        {
            $bodyData = $request->getContent();

            $playlist = $serializer->deserialize(
                $bodyData,
                Playlist::class,
                'json'
            );

            $usuario = $this->getDoctrine()
                ->getRepository(Usuario::class)
                ->findOneBy(['id'=> $id]);

            if (!$usuario) {
                return new JsonResponse(['error' => 'Usuario not found'], 404);
            }

            $playlist->setUsuario($usuario);

            $this->getDoctrine()->getManager()->persist($playlist);
            $this->getDoctrine()->getManager()->flush();

            $playlist = $serializer->serialize(
                $playlist,
                'json',
                ['groups' => ['playlist']]
            );

            return new Response($playlist);
        }
    }

    public function usuario_playlist(Request $request, SerializerInterface $serializer)
    {
        $id_usuario = $request->get('id_usuario');
        $id_playlist = $request->get('id_playlist');

        $playlist = $this->getDoctrine()
            ->getRepository(Playlist::class)
            ->findOneBy(['usuario'=> $id_usuario, 'id'=> $id_playlist]);

        if (!$playlist) {
            return new JsonResponse(['msg' => 'Playlist not found'], 404);
        }

        $id = $playlist->getId();

        $id_activa = $this->getDoctrine()
            ->getRepository(Activa::class)
            ->findOneBy(['playlist'=> $id]);

        if ($id_activa)
        {
            if ($request->isMethod('GET'))
            {
                $playlist = $serializer->serialize(
                    $playlist,
                    'json',
                    ['groups' => ['playlist']]
                );

                return new Response($playlist);
            }

            if ($request->isMethod('PUT'))
            {
                $bodyData = $request->getContent();

                $playlist = $serializer->deserialize(
                    $bodyData,
                    Playlist::class,
                    'json',
                    ['object_to_populate'=> $playlist]
                );

                $this->getDoctrine()->getManager()->persist($playlist);
                $this->getDoctrine()->getManager()->flush();

                $playlist = $serializer->serialize(
                    $playlist,
                    'json',
                    ['groups' => ['playlist']]
                );

                return new Response($playlist);
            }

            if ($request->isMethod('DELETE'))
            {
                // Eliminarla de activas
                $this->getDoctrine()->getManager()->remove($id_activa);
                $this->getDoctrine()->getManager()->flush();

                // Crearla en eliminadas
                $playlistEliminada = new Eliminada();
                $playlistEliminada->setPlaylist($playlist);

                $this->getDoctrine()->getManager()->persist($playlistEliminada);
                $this->getDoctrine()->getManager()->flush();

                $playlistEliminada = $serializer->serialize(
                    $playlistEliminada,
                    'json',
                    ['groups' => ['eliminada', 'playlist']]
                );

                return new Response($playlistEliminada);
            }
        }
        return new JsonResponse(['msg' => 'Playlist not active'], 404);
    }

}