<?php

namespace Controllers;
use Lib\Pages;
use Services\mensajeService;
use Models\Mensaje;
use PDOException;
class MensajeController
{
    private Pages $pages;
    private mensajeService $mensajeService;
    public function __construct()
    {
        $this->pages = new Pages();
        $this->mensajeService = new mensajeService();
    }

    public function index()
    {
        $mensajes = $this->mensajeService->findActive();
        $mensajes = array_map(function ($mensaje) {
            return $mensaje->toArray();
        }, $mensajes);

        $this->pages->render('mensajes/ver', ['mensajes' => $mensajes]);
    }
    

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['id']) {
                $id = $_POST['id'];
                $mensaje = Mensaje::fromArray(['id' => $id]);
                try {
                    $this->mensajeService->delete($mensaje);
                    $_SESSION['success'] = 'Mensaje eliminado';
                    header('Location: ' . BASE_URL . 'mensajes/ver');
                    return;
                } catch (PDOException $e) {
                    $_SESSION['error'] = 'Ha surgido un error';
                    $this->pages->render('mensajes/ver');
                    return;
                }
            } else {
                $_SESSION['error'] = 'Ha surgido un error';
            }
        } else {
            $_SESSION['error'] = 'Ha surgido un error';
        }

        return;
    }
}