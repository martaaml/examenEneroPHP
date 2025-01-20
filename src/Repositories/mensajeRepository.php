<?php

namespace Repositories;

use Lib\DataBase;
use Models\Mensaje;
use PDOException;
use PDO;


class mensajeRepository
{
    private DataBase $conection;
    private mixed $sql;
    public function __construct()
    {
        $this->conection = new DataBase();
    }
    public function findAll()
    {
        $products = [];
        try {
            $this->conection->querySQL("SELECT * FROM mensajes");
            $productsData = $this->conection->allRegister();
            foreach ($productsData as $mensajeData) {
                $mensaje[] = Mensaje::fromArray($mensajeData);
            }
        } catch (PDOException $e) {
            $products = null;
        }
        return $products;
    }
    public function store($mensaje)
    {
        try {
            $this->sql = $this->conection->prepareSQL(
                "INSERT INTO productos(id,de,asunto,cuerpo,fecha,borrado) VALUES (:id,:de,:asunto,:cuerpo,:fecha,:borrado)"
            );
            $this->sql->bindValue(":id",$mensaje->getId());
            $this->sql->bindValue(":de", $mensaje->getDe());
            $this->sql->bindValue(":asunto", $mensaje->getAsunto());
            $this->sql->bindValue(":cuerpo", $mensaje->getCuerpo());
            $this->sql->bindValue(":fecha", $mensaje->getFecha());
            $this->sql->bindValue(":borrado", 0);
            $this->sql->execute();
            $result = null;
        } catch (PDOException $e) {

            $result = $e->getMessage();
        }
        $this->sql->closeCursor();
        return $result;
    }

    public function delete($mensaje)
    {
        try {
            $this->sql = $this->conection->prepareSQL(
                "UPDATE mensajes SET borrado = 1 WHERE id = :id"
            );
            $this->sql->bindValue(":id", $mensaje->getId());
            $this->sql->execute();
            $result = null;
        } catch (PDOException $e) {

            $result = $e->getMessage();
        }
        $this->sql->closeCursor();
        return $result;
    }

    public function findActive()
    {
        try {
            $this->conection->querySQL("SELECT * FROM mensajes WHERE borrado = 0");
            $productosData = $this->conection->allRegister();
            foreach ($productosData as $productoData) {
                $productos[] = Mensaje::fromArray($productoData);
            }
        } catch (PDOException $e) {
            $productos = null;
        }
        return $productos;
    }

    public function findById(int $id)
    {
        try {
            $this->sql = $this->conection->prepareSQL("SELECT * FROM mensajes WHERE id = :id");
            $this->sql->bindValue(":id", $id);
            $this->sql->execute();
            $product = $this->sql->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            $product = null;
        }
        $this->sql->closeCursor();
        return $product;
    }
}
