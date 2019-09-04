<?php

class casilla{
    
    private $numFila;
    private $numColumna;
    private $estado;
    
    
    public function __construct($numFila,$numColumna){
        
        $this->numFila=$numFila;
        $this->numColumna=$numColumna;
        $this->estado=2;
    }
    
    
    
    public function guardarCasilla($mysql,$idTablero) {
        
        if ($mysql->query("INSERT INTO casillas(numFila,numColumna,IDTablero,IDEstadoCasilla) VALUES ('$this->numFila',$this->numColumna,$idTablero,$this->estado)")) {
            return true;
        } else {
            return false;
        }
    }
    
    static public function guardarCasillas1($mysql,$idPartida,$idJugador) {
        $registro = $mysql->query("SELECT IDTablero FROM tableros WHERE IDPartida=$idPartida AND IDJugador=$idJugador");
        while($reg=$registro->fetch_array()) {
            $idTablero=$reg["IDTablero"];
        } 
        $arr=[];
        $registro=$mysql->query("SELECT numFila,numColumna,IDEstadoCasilla FROM casillas WHERE IDTablero=$idTablero");
        while($reg=$registro->fetch_array()) {
            $arr[]=[$reg["numFila"],$reg["numColumna"],$reg["IDEstadoCasilla"]];
        }
        
        return $arr;
        
    }
    static public function guardarCasillas2($mysql,$idPartida,$idJugador) {
        
        $registro = $mysql->query("SELECT IDTablero,IDJugador FROM tableros WHERE IDPartida=$idPartida");
        while($reg=$registro->fetch_array()){
           if($reg["IDJugador"]!=$idJugador){
           $idTablero=$reg["IDTablero"];
           }
        } 
        $arr=[];
        $registro=$mysql->query("SELECT numFila,numColumna,IDEstadoCasilla FROM casillas WHERE IDTablero=$idTablero");
        while($reg=$registro->fetch_array()) {
            $arr[]=[$reg["numFila"],$reg["numColumna"],$reg["IDEstadoCasilla"]];
        }
        
        return $arr;
        
    }
    
    static public function comprobarDisparo($mysql,$disparo,$idPartida,$idJugador) {
        
        $registro = $mysql->query("SELECT IDTablero,IDJugador FROM tableros WHERE IDPartida=$idPartida");
        while($reg=$registro->fetch_array()){
            $idcontrario=$reg["IDJugador"];
           if($idcontrario!=$idJugador){
           $idTablero=$reg["IDTablero"];
           }
        }
        
        
        $registro=$mysql->query("SELECT numFila,numColumna FROM casillas WHERE IDTablero=$idTablero");
        while($reg=$registro->fetch_array()){
            $fila=$reg["numFila"];
            $columna=$reg["numColumna"];
            foreach ($disparo as $indfil => $fil) {
                foreach ($fil as $indcol => $valor) {
                   if($indfil==$fila && $indcol==$columna){
            $estado=4;
            $registro=$mysql->query("UPDATE casillas SET IDEstadoCasilla=$estado WHERE numFila=$indfil AND numColumna=$indcol AND IDTablero=$idTablero");
            return true;
                   } 
                }
            }
            
        }
        foreach ($disparo as $indfil => $fil) {
        foreach ($fil as $indcol => $valor) {
        $estado=3;
        $registro=$mysql->query("INSERT INTO casillas(numFila,numColumna,IDTablero,IDEstadoCasilla)VALUES($indfil,$indcol,$idTablero,$estado)");
        return false;
        }}
    }
    
    
    static public function comprobarGanador($mysql,$idPartida,$idJugador) {
        
        $registro = $mysql->query("SELECT IDTablero,IDJugador FROM tableros WHERE IDPartida=$idPartida");
        while($reg=$registro->fetch_array()){
            $idcontrario=$reg["IDJugador"];
           if($idcontrario!=$idJugador){
           $idTablero=$reg["IDTablero"];
           }
        }
        
        $registro=$mysql->query("SELECT IDEstadoCasilla FROM casillas WHERE IDTablero=$idTablero");
        while($reg=$registro->fetch_array()){
            $estadoCasilla=$reg["IDEstadoCasilla"];
            if($estadoCasilla==2){
            return false;
               } 
        
        }
        
        return true;
    }
    
}

