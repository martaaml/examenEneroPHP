<?php

namespace Controllers;
use Lib\Pages;
use Services\mensajeService;

class MensajeController
{
    private Pages $pages;
   private mensajeService $mensajeService;
    public function __construct()
    {
        $this->pages = new Pages();
        $this->mensajeService = new mensajeService();
    }

    public function index($mensaje)
    {

        $mensajes = $this->mensajeService->Sacar($_SESSION['user']['email']);
      
        $this->pages->render('mensajes/ver', ['mensajes' => $mensajes]);
    }
    
    public function ver($mensaje)
    {
        $mensaje = $this->mensajeService->find($mensaje);
        $this->pages->render('mensajes/ver', ['mensaje' => $mensaje]);
    }
    public function crear()
    {
        $this->pages->render('mensajes/crear');
    }

    public function eliminar($mensaje)
    {
        $mensaje = $this->mensajeService->delete($mensaje);
        $this->pages->render('mensajes/ver', ['mensaje' => $mensaje]);
    }
}