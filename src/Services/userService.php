<?php
    namespace Services;

use Repositories\userRepository;

    class userService{
        // Creando variable con
        private userRepository $userRepository;
        function __construct() {
            $this->userRepository = new userRepository();
        }
        /**
         * Funcion para registrar un usuario
         * 
         * @param string $email con el email del usuario
         * @param string $password con la pass del usuario
         */
        public function register(string $email,string $password):void{
            $this->userRepository->register($email,$password);
        }
        /**
         * Funcion para buscar todos los datos del usuario
         * 
         * @param string $email con el email del usuario
         * @return array con los datos del usuario
         */
        public function getIdentity(string $email) :? array{
            return $this->userRepository->getIdentity($email);
        }
    }