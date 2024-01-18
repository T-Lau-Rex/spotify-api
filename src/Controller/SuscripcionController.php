<?php

namespace App\Controller;

use App\Entity\Premium;
use App\Entity\Suscripcion;
use App\Entity\Usuario;
use LDAP\Result;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class SuscripcionController extends AbstractController
{
    public function suscripciones(Request $request, SerializerInterface $serializer)
    {
        // path: /usuario/{id}/suscripciones

        $id = $request->get("id");

        $suscripciones = $this->getDoctrine()
            ->getRepository(Suscripcion::class)
            ->findOneBy(['premiumUsuario' => $id]);
            
            $suscripciones = $serializer->serialize(
                $suscripciones,
                'json',
                ['groups' => ['suscripcion', 'premium']]
            );
            
            return new Response($suscripciones);
            
        }

        
        
        public function suscripcion(Request $request, SerializerInterface $serializer)
        {
            // path: /usuario/{id_usuario}/suscripcion/{id_suscripcion}
            $id_usuario = $request->get("id_usuario");
            $id_suscripcion = $request->get("id_suscripcion");
            
            $suscripcion = $this->getDoctrine()
            ->getRepository(Suscripcion::class)
            ->findOneBy(['premiumUsuario' => $id_usuario, 'id' => $id_suscripcion]);
            
            $suscripcion = $serializer->serialize(
                $suscripcion,
                'json',
                ['groups' => ['suscripcion', 'premium']]
            );
            
            return new Response($suscripcion);
        }
}
