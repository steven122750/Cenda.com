<?php

class Empleado {
    // Propiedades
    private $nombre;
    private $cargo;
    private $documento;
    private $sede;

    // Constructor
    public function __construct($nombre, $cargo, $documento, $sede) {
        $this->nombre = $nombre;
        $this->cargo = $cargo;
        $this->documento = $documento;
        $this->sede = $sede;
    }

    // Métodos para acceder a las propiedades
    public function getNombre() {
        return $this->nombre;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function getDocumento() {
        return $this->documento;
    }

    public function getSede() {
        return $this->sede;
    }

    // Métodos para establecer las propiedades (si es necesario)
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function setDocumento($documento) {
        $this->documento = $documento;
    }

    public function setSede($sede) {
        $this->sede = $sede;
    }
}

?>
