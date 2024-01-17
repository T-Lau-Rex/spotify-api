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

        if ($request->isMethod("GET")) {

            $configuracion = $serializer->serialize(
                $configuracion,
                'json',
                ['groups'=> ['configuracion']]
            );
    
            return new Response($configuracion);

        }

        /*if ($request->isMethod("PUT")) {

            $data = $request->getContent();
            $updatedConfiguracion = $serializer->deserialize(
                $data, 
                Configuracion::class, 
                'json'
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($updatedConfiguracion);
            $entityManager->flush();

            $serializedUpdatedConfiguracion = $serializer->serialize(
                $updatedConfiguracion,
                'json',
                ['groups' => ['configuracion']]
            );
    
            return new Response($serializedUpdatedConfiguracion);

        }*/

        return new JsonResponse(['msg' => 'Usuario not found']);
    }
}
