<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class ConfigurationController extends AbstractController
{
    public function configuraciones(Request $request, SerializerInterface $serializer)
    {
        
    }
}