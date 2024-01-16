<?php

namespace App\Controller;

use App\Entity\Premium;
use App\Entity\Suscripcion;
use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class SuscripcionController extends AbstractController
{
    public function suscripciones(Request $request, SerializerInterface $serializer)
    {
        // path: /usuario/{id}/suscripciones

        //TODO: Todo MAL, empieza de nuevo !!!!!! 
        $id = $request->get("id");

        // Obtener si es premium con del id de la ruta (equivale al id usuario)
        $premium = $this->getDoctrine()
            ->getRepository(Premium::class)
            ->findOneBy(['usuario_id' => $id]);

    

        $suscripcion = $this->getDoctrine()
            ->getRepository(Suscripcion::class)
            ->findOneBy(['premium_usuario_id' => $id]);

        $usuarioPremium = $suscripcion->getPremiumUsuario();

    }
}
