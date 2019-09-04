<?php

class partida {

    private $id;
    private $jugador1;
    private $jugador2;
    private $estado;

    public function __construct($jugador1) {
        $this->id = null;
        $this->jugador1 = $jugador1;
        $this->jugador2 = "";
        $this->estado = "";
    }

    public function guardarPartidaCreada($mysql, $idJugador) {

        $estado = 1;
        if ($mysql->query("INSERT INTO partidas(IDHost,IDEstadoPartida) VALUES ('$idJugador',$estado)")) {
            return true;
        } else {
            return false;
        }
    }
    
    static public function recuperarPartidasCreadas($mysql){
        $arr=[];
        $registro = $mysql->query("SELECT * FROM partidas");
        while($reg=$registro->fetch_array()){
          $idEstado=$reg["IDEstadoPartida"];
          $idHost=$reg["IDHost"];
          $idcontrin=$reg["IDContrincante"];
          
          $estado=$mysql->query("SELECT Descripcion FROM estadospartida WHERE IDEstadoPartida=$idEstado");
          if($es=$estado->fetch_array()){
              $descrip=$es["Descripcion"];
              
          }
          
          $nombreHost=$mysql->query("SELECT Usuario FROM jugadores WHERE IDJugador=$idHost");
          if($nom=$nombreHost->fetch_array()){
              $host=$nom["Usuario"];
              
          }
          $nombreContrin=$mysql->query("SELECT Usuario FROM jugadores WHERE IDJugador=$idcontrin");
          if($nombreContrin){
          if($con=$nombreContrin->fetch_array()){
              $contrincante=$con["Usuario"];
              
          }
          
          }else{
              $contrincante="Esperando rival";
          }
          
          $arr[]=[$reg["IDPartida"],$host,$contrincante,$descrip];
        }
       if($arr){
         return $arr;   
       }else{
           return false;
       }
       
          
        
    }
    
    
    
    static public function borrarPartida($mysql,$id) {
            if($registros=$mysql->query("DELETE FROM partidas WHERE IDPartida=$id")){
        return true;
    }
    }
    
    
    static function modificarPartidaContrincante($mysql,$idPartida,$idJugador) {
        $estado=3;
          $registro=$mysql->query("UPDATE partidas SET IDEstadoPartida=$estado,IDContrincante=$idJugador WHERE IDPartida=$idPartida")
            or die("problemas en el update ".mysqli_error($conexion));
    return true;
    }
    static function modificarPartida($mysql,$idPartida,$estado) {
        
          $registro=$mysql->query("UPDATE partidas SET IDEstadoPartida=$estado WHERE IDPartida=$idPartida")
            or die("problemas en el update ".mysqli_error($conexion));
    return true;
    }
    
    static public function cambiarTurno($mysql,$idPartida) {
        $estado=$mysql->query("SELECT IDEstadoPartida FROM partidas WHERE IDPartida=$idPartida");
          while($es=$estado->fetch_array()){
              $num=(int)$es["IDEstadoPartida"];
              if($num==4){
                  return 5;
              }
              else{
                  return 4;
              }
          }
    }

}
