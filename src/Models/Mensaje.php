<?php
namespace Models;
class Mensaje
{
    private string $id;
    private string $de;
    private string $asunto;
    private string $cuerpo;
    private string $fecha;
    private bool $borrado;
   
    public function __construct(
        string $id = null,
        string $de,
        string $asunto,
        string $cuerpo,
        string $fecha,
        bool $borrado = false

    ) {
        $this->id = $id??'';
        $this->de = $de;
        $this->asunto = $asunto;
        $this->cuerpo = $cuerpo;
        $this->fecha = $fecha;
        $this->borrado = $borrado;
    }
    

    //GETTER DEL ID DEL MENSAJE
    public function getId(): ?string
    {
        return $this->id;
    }

    //SETTER DEL ID DEL MENSAJE
    public function setId(?string $id): void    
    {
        $this->id = $id;
    }

    //GETTER DE QUEIN MANDA EL MENSAJE
    public function getDe(): string
    {
        return $this->de;
    }

    //SETTER DEL QUE MANDA EL MENSAJE
    public function setDe(string $de): void

    {
        $this->de = $de;

    }

    //GETTER DEL ASUNTO DEL MENSAJE
    public function getAsunto(): string
    {
        return $this->asunto;
    }

    //SETTER DEL ASUNTO DEL MENSAJE
    public function setAsunto(string $asunto): void
    {
        $this->asunto = $asunto;
    }

    //GETTER DEL CUERPO DEL MENSAJE
    public function getCuerpo(): string
    {
        return $this->cuerpo;
    }

    //SETTER DEL CUERPO DEL MENSAJE
    public function setCuerpo(string $cuerpo): void
    {
        $this->cuerpo = $cuerpo;

    }


    //GETTER DEL FECHA DEL PRODUCTO
    public function getFecha(): string
    {
        return $this->fecha;
    }

    //SETTER DEL FECHA DEL PRODUCTO
    public function setFecha(string $fecha): void
    {
        $this->fecha = $fecha;
    }

    //GETTER DEL BORRADO DEL PRODUCTO
    public function getBorrado(): bool
    {
        return $this->borrado;
    }

    //SETTER DEL BORRADO DEL PRODUCTO
    public function setBorrado(bool $borrado): void
    {
        $this->borrado = $borrado;

    }
    //Metodo fromarray
    public static function fromArray(array $data): Mensaje{
        return new Mensaje(
            id: $data['id']??null,
            de: $data['de']??'',
            asunto: $data['asunto']??'',
            cuerpo: $data['cuerpo']??'',
            fecha: $data['fecha']??''
        );
    }

    //Metodo toArray
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'de' => $this->de,
            'nombre' => $this->asunto,
            'descripcion' => $this->cuerpo,
            'borrado' => $this->borrado
        ];
    }



    //Boton para borrar producto
    public function delete()
    {
        $this->borrado=true;
    }
}