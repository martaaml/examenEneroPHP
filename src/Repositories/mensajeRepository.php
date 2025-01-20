<?php

namespace Repositories;
use Lib\DataBase;
use Models\Mensaje;
use PDO;
use PDOException;

class mensajeRepository{
        private DataBase $conection;
        private mixed $sql;
        function __construct(){
            $this->conection = new DataBase();
        }

        public function Sacar($mail):?array {
            $resultado = [];
            try{
                $this->sql = $this->conection->prepareSQL("SELECT * FROM mensajes WHERE asunto LIKE :correo;");
                $this->sql->bindValue(":correo", '%'.$mail.'%');
                $this->sql->execute();
                $resultados = $this->sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($resultados as $resultadoData){
                    $resultado[]=Mensaje::fromArray($resultadoData);
                }
                $this->sql->closeCursor();
            }
            catch(PDOException $e){
                $resultado = $e->getMessage();
            }   
                return $resultado;
        }

        /**
         * Función para buscar un mensaje
         */
        public function find($id) {
            $resultado = [];
            try{
                $this->sql = $this->conection->prepareSQL("SELECT * FROM mensajes;");
                $this->sql->bindValue(":id", $id);
                $this->sql->execute();
                $resultados = $this->sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($resultados as $resultadoData){
                    $resultado[]=Mensaje::fromArray($resultadoData);
                }
                $this->sql->closeCursor();
            }catch(PDOException $e){
                    $resultado = $e->getMessage();
            }
            return $resultado;
        }

        /*
         * Función para eliminar un mensaje
         */
        public function delete($id) {
            try{
                $this->sql = $this->conection->prepareSQL("DELETE FROM mensajes WHERE id=:id;");
                $this->sql->bindValue(":id", $id);
                $this->sql->execute();
                $this->sql->closeCursor();
            }catch(PDOException $e){
                    $resultado = $e->getMessage();
            }
        }
}