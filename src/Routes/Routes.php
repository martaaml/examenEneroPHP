<?php

    namespace Routes;

use Controllers\AdminController;
use Lib\Router;
    use Controllers\AuthController;
use Controllers\ErrorController;
use Controllers\MensajeController;

    class Routes{
        public static function index() {
        Router::add('GET','/',function(){
            (new AuthController())->login();
        });
    
        Router::add('GET','/?page=:id',function($id){
            (new MensajeController())->index($id);
        });

        //Router del registro
        Router::add('GET','/register',function(){
            (new AuthController())->register();
        });
        
        Router::add('POST','/register',function(){
            (new AuthController())->register();
        });
        
        //Router del login
        Router::add('GET','/login',function(){
            (new AuthController())->login();
        });
        Router::add('POST','/login',function(){
            (new AuthController())->login();
        });
        Router::add('GET','/logout',function(){
            (new AuthController())->logout();
        });

        if(isset($_SESSION['user']) && $_SESSION['user']['rol']==='admin'){
            
            Router::add('GET','/mensajes',function($mensaje){
                (new MensajeController())->index($mensaje);
            });
            Router::add('POST','/mensajes',function(){
                (new MensajeController())->crear();
            });
            Router::add('GET','/mensaje/ver',function($id){
                (new MensajeController())->ver($id);
            });
            Router::add('GET','/mensaje/delete',function($id){
                (new MensajeController())->eliminar($id);
            });
        }
        Router::dispatch();
 }

}