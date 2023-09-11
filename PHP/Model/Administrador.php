<?php

class Administrador extends Funcionario {
 

    public function __construct($nombreFuncionario, $documentoFuncionario) {

        parent::__construct($nombreFuncionario, $documentoFuncionario);

        // Inicialización de propiedades específicas de Administrador
        // ...
    }


    public function realizarTareaAdministrativa() {
    
    }
}

?>
