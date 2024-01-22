<?php

namespace App\Controller;

use App\Entity\Configuracion;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class ConfiguracionController extends AbstractController
{
    public function usuarios_configuracion(Request $request, SerializerInterface $serializer)
    {
        $id = $request->get('usuario_id');

        $configuracion = $this->getDoctrine()
            ->getRepository(Configuracion::class)
            ->findOneBy(['usuario' => $id]);

        if (!empty($configuracion)) {

            if ($request->isMethod("GET")) {

                $configuracion = $serializer->serialize(
                    $configuracion,
                    'json',
                    ['groups'=> ['configuracion', 'usuario']]
                );
        
                return new Response($configuracion);

            }

            if ($request->isMethod("PUT")) {

                $bodyData = $request->getContent();

                $configuracion = $serializer->deserialize(
                    $bodyData, 
                    Configuracion::class, 
                    'json',
                    ['object_to_populate' => $configuracion]
                );

                $this->getDoctrine()->getManager()->persist($configuracion);
                $this->getDoctrine()->getManager()->flush();

                $configuracion = $serializer->serialize(
                    $configuracion,
                    'json',
                    ['groups' => ['configuracion', 'usuario']]
                );
        
                return new Response($configuracion);
            }
        }
        return new JsonResponse(['msg' => 'User configuration not found'], 404);
    }
}