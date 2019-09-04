<?php

class usuario{
    private $id;
    private $nombre;
    private $contra;
    
    public function __construct($id,$nombre,$contra) {
        
        $this->id=$id;
        $this->nombre=$nombre;
        $this->contra=$contra;
        
    }
    function getId() {
        return $this->id;
    }

        function getNombre() {
        return $this->nombre;
    }

    function getContra() {
        return $this->contra;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setContra($contra) {
        $this->contra = $contra;
    }


   
}

