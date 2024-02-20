<?php

namespace App\Controller;

use App\Entity\Calidad;
use App\Entity\Configuracion;
use App\Entity\Free;
use App\Entity\Idioma;
use App\Entity\TipoDescarga;
use App\Entity\Usuario;
use PSpell\Config;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Flex\Configurator;

class UsuarioController extends AbstractController
{
    public function usuarios(Request $request, SerializerInterface $serializer)
    {

        // usuarios GET

        if ($request->isMethod("GET"))
        {
            $usuarios = $this->getDoctrine()
            ->getRepository(Usuario::class)
            ->findAll();
            
            $usuarios = $serializer->serialize(
                $usuarios,
                'json',
                ['groups' => ['usuario_api']]);
                
            return new Response($usuarios);
        }
        
        // usuarios POST

        if ($request->isMethod('POST'))
        {
            $bodyData = $request->getContent();
            $usuario = $serializer->deserialize(
                $bodyData,
                Usuario::class,
                'json'
            );

            $usuario->setFechaNacimiento(new \DateTime());
            
            $this->getDoctrine()->getManager()->persist($usuario);

            // Agregar free por defecto
            
            $free = new Free();
            $free->setUsuario($usuario);

            $this->getDoctrine()->getManager()->persist($free);

            // Agregar configuacion por defecto
            
            $configuacion = new Configuracion();
            
            $configuacion->setAutoplay(false);
            $configuacion->setAjuste(false);
            $configuacion->setNormalizacion(false);
            $configuacion->setUsuario($usuario);
            
            $calidad = $this->getDoctrine()
                ->getRepository(Calidad::class)
                ->findOneBy(['id' => 3]);
            $configuacion->setCalidad($calidad);
                
                
            $idioma= $this->getDoctrine()
                ->getRepository(Idioma::class)
                ->findOneBy(['id' => 1]);
            $configuacion->setIdioma($idioma);
                
                
            $tipoDescarga= $this->getDoctrine()
                ->getRepository(TipoDescarga::class)
                ->findOneBy(['id' => 1]);
            $configuacion->setTipoDescarga($tipoDescarga); 
                
                
            $this->getDoctrine()->getManager()->persist($configuacion);
            $this->getDoctrine()->getManager()->flush();
                
            $usuario = $serializer->serialize(
                $usuario,
                'json',
                ['groups' => ['usuario']]
            );
            return new Response($usuario);
        }
        return new JsonResponse(['msg' => $request->getMethod() . ' not allowed']);
    }
    
    
    public function usuario(Request $request, SerializerInterface $serializer)
    {
        $id = $request->get('id');
        $usuario = $this->getDoctrine()
            ->getRepository(Usuario::class)
            ->findOneBy(['id' => $id]);
        
        // usuario GET
        
        if ($request->isMethod("GET")){
            $usuario = $serializer->serialize(
                $usuario,
                'json',
                ['groups' => ['usuario']]
            );
            return new Response($usuario);
        };

        // usuario DELETE

        if ($request->isMethod('DELETE')) {

            $usuarioDel = clone $usuario;

            $configuracion = $this->getDoctrine()
                ->getRepository(Configuracion::class)
                ->findOneBy(['usuario' => $id]);
            
            $free = $this->getDoctrine()
                ->getRepository(Free::class)
                ->findOneBy(['usuario' => $id]);

            if (!empty($free)){
                $this->getDoctrine()->getManager()->remove($free);
            }
            if (!empty($configuracion)){
                $this->getDoctrine()->getManager()->remove($configuracion);
            }

            $this->getDoctrine()->getManager()->remove($usuario);
            $this->getDoctrine()->getManager()->flush();

            $usuarioDel = $serializer->serialize(
                $usuarioDel,
                'json',
                ['groups' => ['usuario']]
            );
            return new Response($usuarioDel);
        };

        // usuario PUT
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
        }
        return new JsonResponse(['msg' => $request->getMethod() . ' Usuario not found']);
    }
}
