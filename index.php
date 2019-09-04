<?php
if(empty($_POST["casi"])){
    $_POST["casi"]=[];
}

include 'clases/bd.php';
include 'clases/usuario.php';
include 'clases/tablero.php';
include 'clases/partida.php';
include 'clases/barcos.php';
include 'clases/casilla.php';

session_start();
$conect=new bd();
$conectar=$conect->conectar();

if(isset($_POST["entrar"])){
    $nombre=$_POST["nombre"];
    $contra=$_POST["contra"];
   if($idJugador=$conect->buscar($conectar, $nombre, $contra)){
     
      $jugador=new usuario($idJugador,$nombre,$contra);
      $_SESSION["jugador"]=$jugador;
      $partidasCreadas=partida::recuperarPartidasCreadas($conectar);
      include 'vistas/principal.php';
   }
   else{
       echo 'El usuario no existe';
       include 'vistas/login.php';
   }
    
}
else if (isset($_POST["regis"])){
    include 'vistas/registro.php';
    
}
else if(isset($_POST["registro"])){
    $nombre=$_POST["nombreReg"];
    $contra=$_POST["contraReg"];
    
    if($conect->registro($conectar, $nombre, $contra)){
        echo 'Usuario Registrado con exito';
        include 'vistas/login.php';
    }
    else{
        echo 'Usuario Registrado, Intentelo de nuevo con otras credenciales';
        include 'vistas/registro.php';
    }
}
else if(isset($_POST["nueva"])){
    
    $partida=new partida($_SESSION["jugador"]->getNombre());
    $idJugador=$_SESSION["jugador"]->getId();
    $partida->guardarPartidaCreada($conectar,$idJugador);
    $partidasCreadas=partida::recuperarPartidasCreadas($conectar);
    include 'vistas/principal.php';        
}
else if(isset($_POST["colocar"])){
    $coords=$_POST["casi"];
    $tablero=new tablero();
    $idTablero=$_SESSION["idTablero"];
    $tableroMarcado=$tablero->construirTablero($coords);
    $barco=new barcos();
    if($barco->comprobarBarcos($tableroMarcado,$coords)){
        foreach ($coords as $indfila => $fila) {
            foreach ($fila as $indcolumna => $valor) {
                $casilla=new casilla($indfila, $indcolumna);
                $casilla->guardarCasilla($conectar,$idTablero);
            }
        }
        
        $partidasCreadas=partida::recuperarPartidasCreadas($conectar);
        include 'vistas/principal.php';
    }else{
       echo 'Tiene que colocar bien los barcos';
       include 'vistas/player.php';
    }
  
  
}
else if(isset ($_POST["unirsePartida"])){
    $idPartida=$_POST["idPartida"];
    $_SESSION["idPartida"]=$idPartida;
    $idJugador=$_SESSION["jugador"]->getId();
    partida::modificarPartidaContrincante($conectar,$idPartida,$idJugador);
    $partidasCreadas=partida::recuperarPartidasCreadas($conectar);
    $tablero=new tablero();
    $tablero->guardarTablero($conectar,$idJugador,$idPartida);
    $_SESSION["idTablero"]=$tablero->getId();
    include 'vistas/player.php';
}
else if(isset($_POST["colocarBarcos"])){
     $idPartida=$_POST["idPartida"];
    $_SESSION["idPartida"]=$idPartida;
    $idJugador=$_SESSION["jugador"]->getId();
    $estado=4;
    partida::modificarPartida($conectar,$idPartida,$estado);
    $tablero=new tablero();
    $tablero->guardarTablero($conectar,$idJugador,$idPartida);
    $_SESSION["idTablero"]=$tablero->getId();
    include 'vistas/player.php';
    
}
elseif (isset ($_POST["borrarPartida"])) {
    $idPartida=$_POST["idPartida"];
    partida::borrarPartida($conectar, $idPartida);
    $partidasCreadas=partida::recuperarPartidasCreadas($conectar);
    include 'vistas/principal.php';
}
else if(isset ($_POST["cerrar"])){
    session_unset();
    session_destroy();
    include 'vistas/login.php'; 
}
else if(isset($_POST["dispara"])){
    $idPartida=(int)$_POST["idPartida"];
    $_SESSION["idPartida"]=$idPartida;
    $idJugador=(int)$_SESSION["jugador"]->getId();
    $tablero1=new tablero();
    $casillas1= casilla::guardarCasillas1($conectar,$idPartida, $idJugador);
    $tablero1Creado=$tablero1->construirTablero1($conectar,$casillas1);
    $tablero2=new tablero();
    $casillas2= casilla::guardarCasillas2($conectar,$idPartida, $idJugador);
    $tablero2Creado=$tablero2->construirTablero2($conectar,$casillas2);
    include 'vistas/jugada.php';
}
else if(isset($_POST["disparar"])){
 $disparo=$_POST["casi"];
 $numeroDisparos=0;
 foreach ($disparo as $indfil => $fil) {
     foreach ($fil as $indcol => $casilla) {
         if($casilla=="on"){
            $numeroDisparos++; 
         }
     }
 }
 if($numeroDisparos!=1){
 $partidasCreadas=partida::recuperarPartidasCreadas($conectar);
 echo '<h1>Tienes que disparar un torpedo, vuelve a intentarlo<h1>';
 include 'vistas/principal.php';
 }else{
 $idPartida=$_SESSION["idPartida"];
 $idJugador=$_SESSION["jugador"]->getId();
 if(casilla::comprobarDisparo($conectar,$disparo,$idPartida,$idJugador)){
     if(casilla::comprobarGanador($conectar,$idPartida,$idJugador)){
         $estado=6;
         $tablero1=new tablero();
         $casillas1= casilla::guardarCasillas1($conectar,$idPartida, $idJugador);
         $tablero1Creado=$tablero1->construirTablero1($conectar,$casillas1);
         $tablero2=new tablero();
         $casillas2= casilla::guardarCasillas2($conectar,$idPartida, $idJugador);
         $tablero2Creado=$tablero2->construirTablero2($conectar,$casillas2);
         partida::modificarPartida($conectar,$idPartida,$estado);
         include 'vistas/ganador.php';
     }else{
         echo '<h1 id=tituTocado>TOCADO</h1>';
         $partidasCreadas=partida::recuperarPartidasCreadas($conectar);
         include 'vistas/principal.php';
     }
 }else{
     $estado=partida::cambiarTurno($conectar,$idPartida);
     partida::modificarPartida($conectar,$idPartida,$estado);
     $partidasCreadas=partida::recuperarPartidasCreadas($conectar);
     echo '<h1 id=tituAgua>AGUA<h1>';
     include 'vistas/principal.php';
 }
 }
}
else if(isset($_POST["final"])){
    $partidasCreadas=partida::recuperarPartidasCreadas($conectar);
     include 'vistas/principal.php';
}
else if(isset($_POST["refresh"])){
    $partidasCreadas=partida::recuperarPartidasCreadas($conectar);
    include 'vistas/principal.php';
}
else if(isset($_POST["volver"])){
    include 'vistas/login.php';
}
else{
    include 'vistas/login.php'; 
}



