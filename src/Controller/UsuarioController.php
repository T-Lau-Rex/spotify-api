<?php

namespace App\Controller;

use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class UsuarioController extends AbstractController
{
    public function usuarios(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod("GET")){
            $usuarios = $this->getDoctrine()
            ->getRepository(Usuario::class)
            ->findAll();
            
            $usuarios = $serializer->serialize(
                $usuarios,
                'json',
                ['groups' => ['usuario']]);
                // ['groups' => ['usuario', 'cancion', 'podcast', 'album', 'artista', 'playlist']]);
                
                return new Response($usuarios);
            }
            
            if ($request->isMethod('POST')){
                
                $bodyData = $request->getContent();
                $usuarios = $serializer->deserialize(
                    $bodyData,
                    Usuario::class,
                    'json'
                );
                
                $this->getDoctrine()->getManager()->persist($usuarios);
                $this->getDoctrine()->getManager()->flush();
                
                $usuarios = $serializer->serialize(
                    $usuarios,
                    'json',
                    ['groups' => ['usuario']]
                );
            return new Response($usuarios);
        }
        return new JsonResponse(['msg' => $request->getMethod() . ' not allowed']);
    }
    
    
    public function usuario(Request $request, SerializerInterface $serializer)
    {
        $id = $request->get('id');
        $usuario = $this->getDoctrine()
            ->getRepository(Usuario::class)
            ->findOneBy(['id' => $id]);

        if ($request->isMethod("GET")){
            $usuario = $serializer->serialize(
                $usuario,
                'json',
                ['groups' => ['usuario']]
            );
            return new Response($usuario);
        };

        if ($request->isMethod('DELETE')) {

            $usuarioDel = clone $usuario;

            $this->getDoctrine()->getManager()->remove($usuario);
            $this->getDoctrine()->getManager()->flush();

            $usuarioDel = $serializer->serialize(
                $usuarioDel,
                'json',
                ['groups' => ['usuario']]
            );
            return new Response($usuarioDel);
        };

        if ($request->isMethod('PUT')) {
            if (!empty($usuario)) {
                $bodyData = $request->getContent();

                $usuario = $serializer->deserialize(
                    $bodyData,
                    Usuario::class,
                    'json',
                    ['object_to_populate' => $usuario]
                );
                
                $this->getDoctrine()->getManager()->persist($usuario);
                $this->getDoctrine()->getManager()->flush();

                $usuario = $serializer->serialize(
                    $usuario,
                    'json',
                    ['groups' => ['usuario']]
                );
                return new Response($usuario);
            }
            return new JsonResponse(['msg' => 'Usuario not found']);
        }
        
    }
}
