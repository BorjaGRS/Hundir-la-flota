<?php

class barcos {

    private $portavion;
    private $acorazado;
    private $crucero;
    private $destructor;

    public function __construct() {

        $this->portavion = 5;
        $this->acorazado = 4;
        $this->crucero = 3;
        $this->destructor = 2;
    }

    public function comprobarBarcos($tablero, $coords) {
        if($coords==[]){
            return false;
        }
        
        $barcos=true;
        $contadorPorta = 0;
        $contadorAcora = 0;
        $contadorCruce = 0;
        $contadorDestr = 0;
        $porta=0;
        $acora=0;
        $cruce=0;
        $des=0;
        
         while($barcos==true){
            foreach ($coords as $indfil => $fila) {
                foreach ($fila as $indcol => $valor) {
                    
                    if ($contadorPorta<1) {
                       if($nuevaCoord=$this->comprobarPortavion($tablero, $indfil, $indcol, $coords)){ 
                        $coords=$nuevaCoord; 
                        $contadorPorta++;
                        $porta=0;
                       }
                       $porta++;
                    }
                    if ($contadorPorta==1 && $contadorAcora<1) {
                       if($nuevaCoord=$this->comprobarAcorazado($tablero, $indfil, $indcol, $coords)){
                          $coords =$nuevaCoord;
                          $contadorAcora++;
                          $acora=0;
                       }
                        $acora++;
                    }
                    if ($contadorPorta==1 && $contadorAcora==1 && $contadorCruce<2) {
                        if($nuevaCoord=$this->comprobarCrucero($tablero, $indfil, $indcol, $coords)){
                        $coords = $nuevaCoord;
                        $contadorCruce++;
                        $cruce=0;
                    }
                    $cruce++;
                        }
                    if ($contadorCruce==2 && $contadorPorta==1 && $contadorAcora==1 && $contadorDestr<3) {
                        if($nuevaCoord=$this->comprobarDestructor($tablero, $indfil, $indcol, $coords)){
                        $coords = $nuevaCoord;
                        $contadorDestr++;
                        $des=0;
                        }
                        $des++;
                        }
                    if ($contadorPorta == 1 && $contadorAcora==1 && $contadorCruce==2 && $contadorDestr==3) {
                        return true;
                    }
                    if($porta==21 || $acora==21 || $cruce==21 || $des==21){
                        $barcos=false;
                    }
                     
                }
            }
         }
            return false;
        }
        


 
    public function comprobarPortavion($tablero, $indfil, $indcol, $coords) {
        $num=0;
        $num1=0;
          if($indfil<=5){
            $posiciones = [$tablero[$indfil][$indcol], $tablero[$indfil + 1][$indcol], $tablero[$indfil + 2][$indcol], $tablero[$indfil + 3][$indcol], $tablero[$indfil + 4][$indcol]];
             foreach ($posiciones as $ind => $value) {
                if ($value == "on") {
                    $num++;
                }
                if ($num == $this->portavion) {
                    foreach ($coords as $indf => $valor) {
                        foreach ($valor as $indc => $resul) {
                            if ($indf == $indfil && $indc == $indcol) {
                                unset($coords[$indfil][$indcol]);
                                unset($coords[$indfil+1][$indcol]);
                                unset($coords[$indfil+2][$indcol]);
                                unset($coords[$indfil+3][$indcol]);
                                unset($coords[$indfil+4][$indcol]);
                                return array_filter($coords);
                            }
                        }
                    }
                }
            }
        
          }
          if($indcol<=5){
            $posiciones = [$tablero[$indfil][$indcol], $tablero[$indfil][$indcol + 1], $tablero[$indfil][$indcol + 2], $tablero[$indfil][$indcol + 3], $tablero[$indfil][$indcol + 4]];
            foreach ($posiciones as $ind => $value) {
                if ($value == "on") {
                    $num1++;
                }
                if ($num1 == $this->portavion) {
                    foreach ($coords as $indf => $valor) {
                        foreach ($valor as $indc => $resul) {
                            if ($indf == $indfil && $indc == $indcol) {
                                unset($coords[$indfil][$indcol]);
                                unset($coords[$indfil][$indcol + 1]);
                                unset($coords[$indfil][$indcol + 2]);
                                unset($coords[$indfil][$indcol + 3]);
                                unset($coords[$indfil][$indcol + 4]);
                                return array_filter($coords);
                            }
                        }
                    }
                }
            }
        
          }
    }

    public function comprobarAcorazado($tablero, $indfil, $indcol, $coords) {
     
         $num=0;
        $num1=0;
        
        if($indfil<=6){
             $posiciones = [$tablero[$indfil][$indcol], $tablero[$indfil + 1][$indcol], $tablero[$indfil + 2][$indcol], $tablero[$indfil + 3][$indcol]];
             foreach ($posiciones as $ind => $value) {
                if ($value == "on") {
                    $num++;
                }
                if ($num == $this->acorazado) {
                    foreach ($coords as $indf => $valor) {
                        foreach ($valor as $indc => $resul) {
                            if ($indf == $indfil && $indc == $indcol) {
                                unset($coords[$indfil][$indcol]);
                                unset($coords[$indfil+1][$indcol]);
                                unset($coords[$indfil+2][$indcol]);
                                unset($coords[$indfil+3][$indcol]);
       
                                return array_filter($coords);
                            }
                        }
                    }
                }
            }
        }
        if($indcol<=6){
            $posiciones = [$tablero[$indfil][$indcol], $tablero[$indfil][$indcol + 1], $tablero[$indfil][$indcol + 2], $tablero[$indfil][$indcol + 3]];
            foreach ($posiciones as $ind => $value) {
                if ($value == "on") {
                    $num1++;
                }
                if ($num1 == $this->acorazado) {
                    foreach ($coords as $indf => $valor) {
                        foreach ($valor as $indc => $resul) {
                            if ($indf == $indfil && $indc == $indcol) {
                                unset($coords[$indfil][$indcol]);
                                unset($coords[$indfil][$indcol + 1]);
                                unset($coords[$indfil][$indcol + 2]);
                                unset($coords[$indfil][$indcol + 3]);
                                
                                return array_filter($coords);
                            }
                        }
                    }
                }
            }
        }  
    }

    public function comprobarCrucero($tablero, $indfil, $indcol, $coords) {
           $num=0;
        $num1=0;
           if($indfil<=7){
             $posiciones = [$tablero[$indfil][$indcol], $tablero[$indfil + 1][$indcol], $tablero[$indfil + 2][$indcol]];
             foreach ($posiciones as $ind => $value) {
                if ($value == "on") {
                    $num++;
                }
                if ($num == $this->crucero) {
                    foreach ($coords as $indf => $valor) {
                        foreach ($valor as $indc => $resul) {
                            if ($indf == $indfil && $indc == $indcol) {
                                unset($coords[$indfil][$indcol]);
                                unset($coords[$indfil+1][$indcol]);
                                unset($coords[$indfil+2][$indcol]);
                            
                                return array_filter($coords);
                            }
                        }
                    }
                }
            }
        
           }
           if($indcol<=7){
            $posiciones = [$tablero[$indfil][$indcol], $tablero[$indfil][$indcol + 1], $tablero[$indfil][$indcol + 2]];
            foreach ($posiciones as $ind => $value) {
                if ($value == "on") {
                    $num1++;
                }
                if ($num1 == $this->crucero) {
                    foreach ($coords as $indf => $valor) {
                        foreach ($valor as $indc => $resul) {
                            if ($indf == $indfil && $indc == $indcol) {
                                unset($coords[$indfil][$indcol]);
                                unset($coords[$indfil][$indcol + 1]);
                                unset($coords[$indfil][$indcol + 2]);
                              
                                return array_filter($coords);
                            }
                        }
                    }
                }
            }
           } 
    }

    public function comprobarDestructor($tablero, $indfil, $indcol, $coords) {

         $num=0;
        $num1=0;
          if($indfil<=8){
             $posiciones = [$tablero[$indfil][$indcol], $tablero[$indfil + 1][$indcol]];
             foreach ($posiciones as $ind => $value) {
                if ($value == "on") {
                    $num++;
                }
                if ($num == $this->destructor) {
                    foreach ($coords as $indf => $valor) {
                        foreach ($valor as $indc => $resul) {
                            if ($indf == $indfil && $indc == $indcol) {
                                unset($coords[$indfil][$indcol]);
                                unset($coords[$indfil+1][$indcol]);
                               
                                $barcoOk=array_filter($coords);
                                if(!$barcoOk){
                                    return true;
                                }
                                else{
                                    return $barcoOk;
                                }
                            }
                        }
                    }
                }
            }
          }
           
         if($indcol<=8){
            $posiciones = [$tablero[$indfil][$indcol], $tablero[$indfil][$indcol + 1]];
            foreach ($posiciones as $ind => $value) {
                if ($value == "on") {
                    $num1++;
                }
                if ($num1 == $this->destructor) {
                    foreach ($coords as $indf => $valor) {
                        foreach ($valor as $indc => $resul) {
                            if ($indf == $indfil && $indc == $indcol) {
                                unset($coords[$indfil][$indcol]);
                                unset($coords[$indfil][$indcol + 1]);
                             
                                  $barcoOk=array_filter($coords);
                                if(!$barcoOk){
                                    return true;
                                }
                                else{
                                    return $barcoOk;
                                }
                            }
                        }
                    }
                }
            }
         }  
    }


    
    
    
    
    
    
    
    
    
    
    
    
    
}
