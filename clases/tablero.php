<?php

class tablero{
    private $id;
            
   private $tablero; 
    
    
    
    public function __construct() {
        $this->tablero=array_fill(0,10,array_fill(0, 10, " "));
        $this->id=0;
    }
    function setId($id) {
        $this->id = $id;
    }
    function getId() {
        return $this->id;
    }

    public function verTablero(){
       $tablero= $this->tablero;
        echo '<table border=1>';
        foreach ($tablero as $indfil => $fila){
            echo '<tr>';
            foreach ($fila as $indcol=>$casilla){
                
            echo "<td><input type='checkbox' id='$indfil,$indcol' name='casi[$indfil][$indcol]'><label for='$indfil,$indcol'></label></td>";
            }
            echo '</tr>';
        }
        echo '</table>';
        
}
public function construirTablero($marcas) {
    
    $tablero= $this->tablero;
    
    foreach ($marcas as $indfil => $fila) {
        foreach ($fila as $indcol => $casilla) {
            $tablero[$indfil][$indcol]="on";
        }
    }
    return $tablero;
}

public function guardarTablero($mysql,$idJugador,$idPartida){
    $idTablero=0;
    
    $registro = $mysql->query("SELECT IDTablero FROM tableros");
        while($reg=$registro->fetch_array()){
            $posibleId=$reg["IDTablero"];
          if($idTablero<$posibleId){
              $idTablero=$posibleId;
          }
        } 
            
        
    $idTablero++;
    $this->setId($idTablero);
    $registro=$mysql->query("INSERT INTO tableros(IDTablero,IDJugador,IDPartida) values ($idTablero,$idJugador,$idPartida)");   
        return true;
}

public function construirTablero1($mysql,$casillas){
    
    $tablero= $this->tablero;
    
    for($i=0;$i<count($casillas);$i++){
        
        $fila=$casillas[$i][0];
        $columna=$casillas[$i][1];
        $estado=$casillas[$i][2];
        
        
         if($estado==2){
            $tablero[$fila][$columna]="barco";
        }
        else if($estado==3){
            $tablero[$fila][$columna]="agua con torpedo";
        }
        else if($estado==4){
            $tablero[$fila][$columna]="barco con torpedo";
        }
    }
    return $tablero;
}

public function construirTablero2($mysql,$casillas){
    
    $tablero= $this->tablero;
    
    for($i=0;$i<count($casillas);$i++){
        
        $fila=$casillas[$i][0];
        $columna=$casillas[$i][1];
        $estado=$casillas[$i][2];
        
         if($estado==3){
            $tablero[$fila][$columna]="agua con torpedo";
        }
        else if($estado==4){
            $tablero[$fila][$columna]="barco con torpedo";
        }
    }
    return $tablero;
}

public function verTablero1($tablero) {
    
        echo '<table border=1 id=tablero1>';
        foreach ($tablero as $indfil => $fila){
            echo '<tr>';
            foreach ($fila as $indcol=>$casilla){
                
                 if($casilla=="barco"){
                    echo "<td><input id='barco' type='text' name='casilla' readonly></td>";
                }
                else if($casilla=="agua con torpedo"){
                    echo "<td><input id='aguatorpedo' type='text' name='casilla' readonly></td>";
                }
                else if($casilla=="barco con torpedo"){
                    echo "<td><input id='barcotorpedo' type='text' name='casilla' readonly></td>";
                }
                else{
                     echo "<td><input id='normal' type='text' name='casilla' readonly></td>";
                }
            
            }
            echo '</tr>';
        }
        echo '</table>';
    
}
public function verTablero2($tablero) {
    
        echo '<table border=1 id=tablero2>';
        foreach ($tablero as $indfil => $fila){
            echo '<tr>';
            foreach ($fila as $indcol=>$casilla){
                
                if($casilla=="agua con torpedo"){
                  echo "<td><input id='aguatorpe' type='text' name='casilla' readonly></td>";
                }
                else if($casilla=="barco con torpedo"){
                  echo "<td><input id='barcotorpe' type='text' name='casilla' readonly></td>";
                }
                else{
                  echo "<td><input type='checkbox' id='$indfil,$indcol' name='casi[$indfil][$indcol]'><label for='$indfil,$indcol'></label></td>";
                }
            
            }
            echo '</tr>';
        }
        echo '</table>';
    
}
    





            }

