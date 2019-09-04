<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            body{
                background-image: url("imagenes/principal.png");
            }
            [type="text"]{
                width: 16px;
                background-color: blue;
                color: white;
            }
            h1{

                text-align: center;
                background-color: goldenrod;
                color: black;
                font: oblique bold 230% cursive; 
            }
            h2{

                text-align: center;
                background-color: goldenrod;
                color: black;
                font: oblique bold 170% cursive; 
            }
            h3{
                text-align: center;
                background-color: #82b085;
                font: oblique bold 130% cursive;
                width: 800px;
                margin-left: 900px;
            }
            #user{
               font: oblique bold 130% cursive;   
            }
            #cabecera{

                margin-top: -55px;
            }
            [type="submit"]{
                 
                width: 150px;
                height: 30px;
                text-decoration: none;
                padding: 3px;
                padding-left: 10px;
                padding-right: 10px;
                font-family: helvetica;
                font-weight: 300;
                font-size: 15px;
                font-style: italic;
                color: white;
                background-color: black;
                border-radius: 15px;
                border: 3px double #006505;
                cursor: pointer;
            }
            #nueva{
                margin-left: 1170px;
                width: 250px;
                height: 50px;
                text-decoration: none;
                padding: 3px;
                padding-left: 10px;
                padding-right: 10px;
                font-family: helvetica;
                font-weight: 300;
                font-size: 25px;
                font-style: italic;
                color: white;
                background-color: black;
                border-radius: 15px;
                border: 3px double #006505;
                cursor: pointer;

            }
            #cerrar{
                width: 200px;
                height: 50px;
                text-decoration: none;
                padding: 3px;
                padding-left: 10px;
                padding-right: 10px;
                font-family: helvetica;
                font-weight: 300;
                font-size: 25px;
                font-style: italic;
                color: white;
                background-color: black;
                border-radius: 15px;
                border: 3px double #006505;
                cursor: pointer;
            }
            #refresh{
                margin-left: 1000px;
                width: 550px;
                height: 50px;
                text-decoration: none;
                padding: 3px;
                padding-left: 10px;
                padding-right: 10px;
                font-family: helvetica;
                font-weight: 300;
                font-size: 25px;
                font-style: italic;
                color: white;
                background-color: black;
                border-radius: 15px;
                border: 3px double #006505;
                cursor: pointer;
            }
            #tituAgua{
                text-align: center;
                background-color: aqua;
                color: black;
                font: oblique bold 230% cursive; 
            }
            #tituTocado{
                text-align: center;
                background-color: red;
                color: black;
                font: oblique bold 230% cursive; 
            }
          

        </style>
    </head>
    <body>
        <h1>HUNDIR LA FLOTA</h1>
        <div id="cabecera">
            <h4 id="user">Usuario <?= $_SESSION["jugador"]->getNombre() ?></h4>
            <form action="index.php" method="POST">
                <input type="submit" id="cerrar" name="cerrar" value="Cerrar Sesion">
                <br>
                <input type="submit" id="nueva" name="nueva" value="NUEVA PARTIDA">
                <br>
                <br>
                <input type="submit" id="refresh" name="refresh" value="CARGAR ESTADOS PARTIDAS">
                </div>
               </form>
                <br>
                <br>
                <h2>LISTADO PARTIDAS</h2>
                <br>
                <?php if ($partidasCreadas) {
                    for ($i = 0; $i < count($partidasCreadas); $i++) {
                        ?>
                     
        <?php if ($_SESSION["jugador"]->getNombre() == $partidasCreadas[$i][1] && $partidasCreadas[$i][2] == "Esperando rival") { ?>
                              <form action="index" method="POST">
                            <h3><input type="text"  name="idPartida" value=<?= $partidasCreadas[$i][0] ?> readonly hidden ><?= $partidasCreadas[$i][1] ?> VS <?= $partidasCreadas[$i][2] ?> - Estado:<?= $partidasCreadas[$i][3] ?></input>
                            <input type="submit" name="borrarPartida" value="Borrar Partida"></h3>
                                  </form>
        <?php } else if ($partidasCreadas[$i][3] == "Creada" && $_SESSION["jugador"]->getNombre() != $partidasCreadas[$i][1]) { ?>
                <form action="index.php" method="POST">
                            <h3><input type="text"  name="idPartida" value=<?= $partidasCreadas[$i][0] ?> readonly hidden ><?= $partidasCreadas[$i][1] ?> VS <?= $partidasCreadas[$i][2] ?> - Estado:<?= $partidasCreadas[$i][3] ?></input>
                                <input type="submit" name="unirsePartida" value="Unirse a Partida"></h3>
                                     </form>
        <?php } else if ($_SESSION["jugador"]->getNombre() == $partidasCreadas[$i][2] && $partidasCreadas[$i][3] == "Contrincante con barcos preparados") { ?>
                                
                            <h3><input type="text"  name="idPartida" value=<?= $partidasCreadas[$i][0] ?> readonly hidden ><?= $partidasCreadas[$i][1] ?> VS <?= $partidasCreadas[$i][2] ?> - Estado:<?= $partidasCreadas[$i][3] ?></input>
                            : ESPERANDO</h3>
        <?php } else if ($_SESSION["jugador"]->getNombre() == $partidasCreadas[$i][1] && $partidasCreadas[$i][3] == "Contrincante con barcos preparados") { ?>
                               <form action="index.php" method="POST">  
                           <h3> <input type="text"  name="idPartida" value=<?= $partidasCreadas[$i][0] ?> readonly hidden ><?= $partidasCreadas[$i][1] ?> VS <?= $partidasCreadas[$i][2] ?> - Estado:<?= $partidasCreadas[$i][3] ?></input>
                            <input type="submit" name="colocarBarcos" value="Colocar Barcos"></h3>
                                   </form>
        <?php } else if ($_SESSION["jugador"]->getNombre() == $partidasCreadas[$i][1] && $partidasCreadas[$i][3] == "Empezada - Turno Host") { ?>
                               <form action="index.php" method="POST">
                            <h3><input type="text"  name="idPartida" value=<?= $partidasCreadas[$i][0] ?> readonly hidden ><?= $partidasCreadas[$i][1] ?> VS <?= $partidasCreadas[$i][2] ?> - Estado:<?= $partidasCreadas[$i][3] ?></input>
                            <input type="submit" name="dispara" value="Disparar Torpedo"></h3>
                              </form>
        <?php } else if ($_SESSION["jugador"]->getNombre() == $partidasCreadas[$i][2] && $partidasCreadas[$i][3] == "Empezada - Turno Contrincante") { ?>
                                <form action="index.php" method="POST">
                            <h3><input type="text"  name="idPartida" value=<?= $partidasCreadas[$i][0] ?> readonly hidden ><?= $partidasCreadas[$i][1] ?> VS <?= $partidasCreadas[$i][2] ?> - Estado:<?= $partidasCreadas[$i][3] ?></input>
                            <input type="submit" name="dispara" value="Disparar Torpedo"></h3>
                                    </form>
        <?php } else if ($_SESSION["jugador"]->getNombre() == $partidasCreadas[$i][1] && $partidasCreadas[$i][3] == "Empezada - Turno Contrincante") { ?>
                               
                            <h3><input type="text"  name="idPartida" value=<?= $partidasCreadas[$i][0] ?> readonly hidden ><?= $partidasCreadas[$i][1] ?> VS <?= $partidasCreadas[$i][2] ?> - Estado:<?= $partidasCreadas[$i][3] ?></input>
                            : ESPERANDO</h3>
        <?php } else if ($_SESSION["jugador"]->getNombre() == $partidasCreadas[$i][2] && $partidasCreadas[$i][3] == "Empezada - Turno Host") { ?>
                                 
                           <h3><input type="text"  name="idPartida" value=<?= $partidasCreadas[$i][0] ?> readonly hidden ><?= $partidasCreadas[$i][1] ?> VS <?= $partidasCreadas[$i][2] ?> - Estado:<?= $partidasCreadas[$i][3] ?></input>
                            : ESPERANDO</h3>
        <?php } else if ($partidasCreadas[$i][3] == "Finalizada" && $_SESSION["jugador"]->getNombre() == $partidasCreadas[$i][2] || $partidasCreadas[$i][3] == "Finalizada" && $_SESSION["jugador"]->getNombre() == $partidasCreadas[$i][1]) { ?>
                                 
                            <h3><input type="text"  name="idPartida" value=<?= $partidasCreadas[$i][0] ?> readonly hidden ><?= $partidasCreadas[$i][1] ?> VS <?= $partidasCreadas[$i][2] ?> - Estado:<?= $partidasCreadas[$i][3] ?></input>
                            : PARTIDA FINALIZADA</h3>
                        <?php
                        }
                  
                    }
                } else {
                    echo '<h3>No hay Partidas</h3>';
                }
                ?>
  
    </body>
</html>
