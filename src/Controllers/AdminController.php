<?php
namespace Controllers;
use Lib\Pages;
use Services\mensajeService;
use Services\userService;


class AdminController{
    private Pages $pages;
    private userService $userService;
    private mensajeService $mensajeService;

    public function __construct (){
        $this->pages=new Pages();
        $this->userService=new userService();
        $this->mensajeService=new mensajeService();
    }

    //Funcion para iniciar sesion
    public function index(){
        $gestion=[
            0=>[
                'title'=>'Gestion de categorias',
                'id'=>0
            ],
            1=>[
                'title'=>'Gestion de productos',
                'id'=>1
            ],
            2=>[
                'title'=>'Gestion de pedidos',
                'id'=>2
            ]];

            $mensajes= $this->mensajeService->allProducts();
            $mensajes=array_map(function($product){
                return $product->toArray();
            },$mensajes);



        $this->pages->render('admin/index',['menu'=>$gestion,'mensajes'=>$mensajes]);
    }
}