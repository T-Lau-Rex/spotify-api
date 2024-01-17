<?php

namespace App\Controller;

use App\Entity\TipoDescarga;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class TipoDescargaController extends AbstractController {

    public function tipos_descargas(Request $request, SerializerInterface $serializer) 
    {
        if ($request->isMethod("GET"))
        {
            $tiposDescargas = $this->getDoctrine()
                ->getRepository(TipoDescarga::class)
                ->findAll();

            $tiposDescargas = $serializer->serialize(
                $tiposDescargas,
                'json',
                ['groups' => ['tipoDescarga']]);
            
            return new Response($tiposDescargas);
        }
    }
}