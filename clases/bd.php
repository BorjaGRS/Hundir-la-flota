<?php

class bd {

    private $local;
    private $nombre;
    private $contra;
    private $base;

    public function __construct() {
        $this->local = "localhost";
        $this->nombre = "root";
        $this->contra = "";
        $this->base = "flota";
    }

    public function conectar() {
        $mysql = new mysqli($this->local, $this->nombre, $this->contra, $this->base);

        if ($mysql->connect_error) {
            die("Problemas en la conexion de la base de datos");
        }
        return $mysql;
    }

    public function buscar($mysql, $nom, $pass) {

        $registro = $mysql->query("SELECT IDJugador FROM jugadores WHERE Usuario='$nom' and Password='$pass'");

        if ($reg=$registro->fetch_array()) {
            return $reg["IDJugador"] ;
        } else {
            return false;
        }
    }

    public function registro($mysql, $nom, $pass) {

        $registro = $mysql->query("SELECT Password FROM jugadores WHERE Password='$pass'");
        if ($registro->fetch_array()) {
            return false;
        } else {
            $mysql->query("INSERT INTO jugadores(Usuario,Password) VALUES ('$nom','$pass')");
            return true;
        }
    }

}
