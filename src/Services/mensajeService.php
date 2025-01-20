<?php
namespace Services;
use Repositories\mensajeRepository;

class mensajeService{
    protected mensajeRepository $mensajeRepository;
    function __construct()
    {
        $this->mensajeRepository = new mensajeRepository();
    }
    public function allProducts()
    {
        return $this->mensajeRepository->findAll();
    }   
    public function store($mensaje)
    {
        return $this->mensajeRepository->store($mensaje);
    }

    public function delete($mensaje)
    {
        return $this->mensajeRepository->delete($mensaje);
    }
    public function findActive()
    {
        return $this->mensajeRepository->findActive();
    }
    public function findById(int $id)
    {
        return $this->mensajeRepository->findById($id);
    }
}