<?php

namespace App\Controller;

use App\Entity\AnyadeCancionPlaylist;
use App\Entity\Cancion;
use App\Entity\Playlist;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class AnyadeCancionPlaylistController extends AbstractController
{
    public function anyade_cancion_playlist(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod("POST"))
        {
            $id_playlist = $request->get("id_playlist");
            $id_cancion = $request->get("id_cancion");

            $playlist = $this->getDoctrine()
                ->getRepository(Playlist::class)
                ->findOneBy(["id" => $id_playlist]);

            $cancion = $this->getDoctrine()
                ->getRepository(Cancion::class)
                ->findOneBy(["id" => $id_cancion]);

            if (empty($playlist) || empty($cancion))
            {
                return new JsonResponse(['msg' => 'Cancion o playlist no encontrada.'], 404);
            }

            $exist = $this->getDoctrine()
            ->getRepository(AnyadeCancionPlaylist::class)
            ->findOneBy(["playlist" => $playlist, "cancion" => $cancion]);

            if (!empty($exist)) 
            {
                return new JsonResponse(['msg' => 'La canción ya está en la playlist.']);
            }

            $usuario = $playlist->getUsuario();

            $anyade_cancion_playlist = new AnyadeCancionPlaylist();
            $anyade_cancion_playlist->setFechaAnyadida(new \DateTime());
            $anyade_cancion_playlist->setCancion($cancion);
            $anyade_cancion_playlist->setPlaylist($playlist);
            $anyade_cancion_playlist->setUsuario($usuario);

            $this->getDoctrine()->getManager()->persist($anyade_cancion_playlist);
            $this->getDoctrine()->getManager()->flush();

            $anyade_cancion_playlist = $serializer->serialize(
                $anyade_cancion_playlist,
                'json',
                ['groups' => ['anyade_cancion_playlist', 'usuario_api', 'playlist']]
            );
            return new Response($anyade_cancion_playlist);
        }
    }
}