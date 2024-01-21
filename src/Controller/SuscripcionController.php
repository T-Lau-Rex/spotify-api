<?php

namespace App\Controller;

use App\Entity\FormaPago;
use App\Entity\Pago;
use App\Entity\Paypal;
use App\Entity\Premium;
use App\Entity\Suscripcion;
use App\Entity\TarjetaCredito;
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

        // $usuario =$this->getDoctrine()
        // ->getRepository(Usuario::class)
        // ->findOneBy(['id' => $id]);

        // $suscripciones = $this->getDoctrine()
        //     ->getRepository(Suscripcion::class)
        //     ->findBy(['premiumUsuario' => $usuario]);

        $suscripciones = $this->getDoctrine()
            ->getRepository(Suscripcion::class)
            ->findBy(['premiumUsuario' => $id]);
            
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

            $pago = $this->getDoctrine()
                ->getRepository(Pago::class)
                ->findOneBy(['suscripcion' => $id_suscripcion]);
            
            $getFormaPago = $pago->getFormaPago();

            $formaPago = $this->getDoctrine()
                ->getRepository(FormaPago::class)
                ->findOneBy(['id' => $getFormaPago]);
                
            $suscripcion = $this->getDoctrine()
                ->getRepository(Suscripcion::class)
                ->findBy(['premiumUsuario' => $id_usuario, 'id' => $id_suscripcion]);
                
            # FIXME: Obtener la forma de pago

            // $tarjeta = $this->getDoctrine()
            //     ->getRepository(TarjetaCredito::class)
            //     ->findOneBy(['formaPago' => $formaPago]);

            // $paypal = $this->getDoctrine()
            //     ->getRepository(Paypal::class)
            //     ->findOneBy(['formaPago' => $formaPago]);
                
            // if (!empty($tarjeta)) {
            //     $formaPago = $tarjeta;
                
            // } elseif (!empty($paypal)) {
            //     $formaPago = $paypal;
                
            // }

            # FIXME: FIN de obtener la forma de pago
                
            $data = [
                'pago' => $pago,
                
            ];

            $suscripcion = $serializer->serialize(
                $data,
                'json',
                ['groups' => ['suscripcion', 'pago', 'formapago', 'tarjeta', 'paypal']]
            );
            
            return new Response($suscripcion);
        }
}
