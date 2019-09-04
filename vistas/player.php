<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            body{
                background-image: url("imagenes/colocar.png");
            }
            table{
                margin-top: -230px;
                width: 600px;
                height: 700px;
                margin-left: 900px;
               
            }
            [type="checkbox"]{
              width: 70px;
              position:absolute;
            }
            label{
             content: '';
             cursor:pointer;
            position: relative;
            padding-top: 24px;
            padding-right: 50px;
            padding-bottom: 20px;
            
            }
            label:before{
            content: '';
            position: absolute;
            width: 57px;
            height: 65px;
            background-color: aqua;
            }
            
            [type="checkbox"]:checked+label:before{
                
                background-color: black;
                
            }
            [type="submit"]{
                margin-top: 100px;
                margin-left: 700px;
                text-decoration: none;
                padding: 3px;
                padding-left: 10px;
                padding-right: 10px;
                font-family: helvetica;
                font-weight: 200;
                font-size: 20px;
                font-style: italic;
                color: white;
                background-color: black;
                border-radius: 15px;
                border: 3px double red;
                cursor: pointer;
    
      
            }
            h3{
                text-align: center;
                width: 200px;
                margin-left: 300px;
               background-color: white;
            }
            h2{
                position: absolute;
                text-align: center;
                width: 300px;
                margin-top: 82px;
                margin-left: 300px;
                background-color: white;
            }
        </style>
    </head>
    <body>
        <form method="POST" action="index.php">
            
            <h2>Marca horizontal o vertical 7 barcos que son:</h2>
            <input type="submit" name="colocar" value="Colocar barcos">
            <h3>1-Portavion(5 casillas)</h3>
            <h3>1-Acorazado(4 casillas)</h3>
            <h3>2-Crucero(3 casillas)</h3>
            <h3>3-Destructor(2 casillas)</h3>
        <?php
        $tablero->verTablero();
        ?> 
        </form>
    </body>
</html>
