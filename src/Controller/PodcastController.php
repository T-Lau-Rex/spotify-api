<?php

namespace App\Controller;

use App\Entity\Podcast;
use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

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

        if ($podcast)
        {
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
        return new JsonResponse(['msg' => 'Podcast not found'], 404);
    }

    public function usuario_podcasts(Request $request, SerializerInterface $serializer)
    {
        $id = $request->get('id');

        $usuario = $this->getDoctrine()
            ->getRepository(Usuario::class)
            ->findOneBy(['id'=> $id]);

        if ($usuario)
        {
            if ($request->isMethod('GET')) {
            
                $podcasts = $usuario->getPodcast();
    
                $podcasts = $serializer->serialize(
                    $podcasts,
                    'json',
                    ['groups'=> ['podcast']]
                );
    
                return new Response($podcasts);
            }
        }
        return new JsonResponse(['msg'=> 'Usuario not found'], 404);
    }

    public function usuario_podcast(Request $request, SerializerInterface $serializer)
    {
        $id_usuario = $request->get('id_usuario');
        $id_podcast = $request->get('id_podcast');

        $usuario = $this->getDoctrine()
            ->getRepository(Usuario::class)
            ->findOneBy(['id'=> $id_usuario]);

        $podcast = $this->getDoctrine()
            ->getRepository(Podcast::class)
            ->findOneBy(['id'=> $id_podcast]);
    
        if ($request->isMethod('POST')) {
        
            if (!$usuario->getPodcast()->contains($podcast)) {

                $podcasts = $usuario->getPodcast();

                $podcasts[] = $podcast;

                $usuario->setPodcast($podcasts);
    
                $this->getDoctrine()->getManager()->persist($usuario);
                $this->getDoctrine()->getManager()->flush();

                $usuario = $serializer->serialize(
                    $usuario,
                    'json',
                    ['groups'=> ['usuario']]
                );
    
                return new Response($usuario);
            }
            return new JsonResponse(['msg' => 'Podcast not found at user'], 404);
        }

        if ($request->isMethod('DELETE')) {

            if ($usuario->getPodcast()->contains($podcast)) {

                $podcasts = $usuario->getPodcast();

                $podcasts->removeElement($podcast);

                $usuario->setPodcast($podcasts);

                $this->getDoctrine()->getManager()->persist($usuario);
                $this->getDoctrine()->getManager()->flush();

                $usuario = $serializer->serialize(
                    $usuario,
                    'json',
                    ['groups'=> ['usuario']]
                );

                return new Response($usuario);
            }
            return new JsonResponse(['msg' => 'Podcast not found at user'], 404);
        }
        
    }
}