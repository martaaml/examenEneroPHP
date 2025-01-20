<?php

namespace Services;
use Repositories\mensajeRepository;

class mensajeService{
    private mensajeRepository $repository;
    public function __construct()
    {
        $this->repository = new mensajeRepository();
    }
    /**
     * Función para sacar todos los correos de un email
     */
    public function sacar($mail) :array {
        return $this->repository->sacar($mail);
    }
    public function find($id) {
        return $this->repository->find($id);
    }
    public function delete($id) {
        return $this->repository->delete($id);
    }
}

