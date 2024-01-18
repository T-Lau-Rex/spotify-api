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
        $id = $request->get("id");

        $usuario =$this->getDoctrine()
        ->getRepository(Usuario::class)
        ->findOneBy(['id' => $id]);

        $suscripciones = $this->getDoctrine()
            ->getRepository(Suscripcion::class)
            ->findBy(['premiumUsuario' => $usuario]);
            
        $suscripciones = $serializer->serialize(
            $suscripciones,
            'json',
            ['groups' => ['suscripcion']]
        );
        
        return new Response($suscripciones);
            
        }

        public function suscripcion(Request $request, SerializerInterface $serializer)
        {

            $id_usuario = $request->get("id_usuario");
            $id_suscripcion = $request->get("id_suscripcion");

            $usuario = $this->getDoctrine()
            ->getRepository(Suscripcion::class)
            ->findOneBy(['id' => $id_usuario]);
            
            $suscripcion = $this->getDoctrine()
            ->getRepository(Suscripcion::class)
            ->findBy(['premiumUsuario' => $usuario, 'id' => $id_suscripcion]);
            
            $suscripcion = $serializer->serialize(
                $suscripcion,
                'json',
                ['groups' => ['suscripcion']]
            );
            
            return new Response($suscripcion);
        }
}
