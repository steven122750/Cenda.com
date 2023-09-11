<?php

class PruebaAlcoholemia {
    // Propiedades
    private $nombreFuncionario;
    private $documentoFuncionario;
    private $numeroPrueba;
    private $resultadoPrueba;
    private $mgAlcohol;
    private $grado;

    // Constructor
    public function __construct($nombreFuncionario, $documentoFuncionario, $numeroPrueba, $resultadoPrueba, $mgAlcohol, $grado) {
        $this->nombreFuncionario = $nombreFuncionario;
        $this->documentoFuncionario = $documentoFuncionario;
        $this->numeroPrueba = $numeroPrueba;
        $this->resultadoPrueba = $resultadoPrueba;
        $this->mgAlcohol = $mgAlcohol;
        $this->grado = $grado;
    }

    // Métodos para acceder a las propiedades
    public function getNombreFuncionario() {
        return $this->nombreFuncionario;
    }

    public function getDocumentoFuncionario() {
        return $this->documentoFuncionario;
    }

    public function getNumeroPrueba() {
        return $this->numeroPrueba;
    }

    public function getResultadoPrueba() {
        return $this->resultadoPrueba;
    }

    public function getMgAlcohol() {
        return $this->mgAlcohol;
    }

    public function getGrado() {
        return $this->grado;
    }

    // Métodos para establecer las propiedades (si es necesario)
    public function setNombreFuncionario($nombreFuncionario) {
        $this->nombreFuncionario = $nombreFuncionario;
    }

    public function setDocumentoFuncionario($documentoFuncionario) {
        $this->documentoFuncionario = $documentoFuncionario;
    }

    public function setNumeroPrueba($numeroPrueba) {
        $this->numeroPrueba = $numeroPrueba;
    }

    public function setResultadoPrueba($resultadoPrueba) {
        $this->resultadoPrueba = $resultadoPrueba;
    }

    public function setMgAlcohol($mgAlcohol) {
        $this->mgAlcohol = $mgAlcohol;
    }

    public function setGrado($grado) {
        $this->grado = $grado;
    }
}

?>
