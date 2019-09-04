<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            body{
                background-image: url("imagenes/fondo.png");
                
            }
            h1{
                color: white;
                
                 font: oblique bold 230% cursive;
            }
            #barco{
                background-color: black;
                width: 50px;
                height: 70px;
            }
            #aguatorpedo{
                background-color: violet;
                width: 50px;
                height: 70px;
                
            }
            #barcotorpedo{
                background-color: red;
                width: 50px;
                height: 70px;
            }
            #aguatorpe{
                background-color: violet;
                width: 90px;
                height: 78px;
                
            }
            #barcotorpe{
                background-color: red;
                width: 90px;
                height: 78px;
            }
            #normal{
                background-color: aqua;
                width: 50px;
                height: 70px;
            }
            #tocado{
               font-weight: bold;
                width: 80%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  background-color: red;
  color: black;
            }
            #agua{
             font-weight: bold;
              width: 80%;
              padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
           border: none;
           background-color: violet;
          color: black;
            }
             table{
                margin-top: 10px;
                width: 200px;
                height: 500px;
            }
            #tablero1{
                float: left;
                margin-left: 180px;
            }
            #tablero2{
                float: right;
                margin-right: 180px;
                
            }
            [type="checkbox"]{
              width: 80px;
              height: 50px;
             /* position:absolute;*/
            }
             label{
            content: '';
            cursor:pointer;
            position: relative;
            padding-top: 58px;
            padding-right: 90px;
            }
            label:before{
            content: '';
            position: absolute;
            width: 57px;
            height: 65px;
            background-color: aqua;
            padding-bottom: 10px;
            padding-left: 31px;
            border: solid 1px;
            }
            
            [type="checkbox"]:checked+label:before{
                
                background-color: black;
                
            }
            [type="submit"]{
                width: 120px;
                height: 50px;
                  text-decoration: none;
             padding: 3px;
           padding-left: 10px;
         padding-right: 10px;
        font-family: helvetica;
        font-weight: 300;
        font-size: 25px;
       font-style: italic;
       color: #006505;
       background-color: #82b085;
      border-radius: 15px;
      border: 3px double #006505;
      cursor: pointer;
      margin-left: 22px;
      margin-top: -20px;
            }
            [type="submit"]:hover{
   background-color:green;
   color: white;
    text-decoration: none;
    
  }
            #leyenda{
                position: absolute;
                margin-top: 300px;
                margin-left: 1000px;
                
            }
            #batalla{
                text-align: center;
                float: right;
               
            }
            #mio{
                text-align: center;
                float: left;
            }
            h2{
                background-color: white;
                width: 100px;
                margin-left: 30px;
                text-align: center;
            }
       
       </style>
    </head>
    <body>
        <form method="POST" action="index.php">
            <div id="mio">
            <h1>Tu Tablero</h1>
        <?php
        $tablero1->verTablero1($tablero1Creado);
       ?>
          </div>
            <div id="leyenda">   
                <input type="text" id="tocado" value="Barco con Torpedo" readonly>
        <br>
        <input type="text" id="agua" value="Agua con Torpedo" readonly>
        <br>
        <br>
        <br>
        <h2>Marca en tablero batalla y</h2>
        <input type="submit" name='disparar' value="Dispara">
        </div>
        <div id="batalla">
        <h1>Tablero Batalla</h1>
        <?php
        $tablero2->verTablero2($tablero2Creado);
        ?>
        </div> 
        </form>
    </body>
</html>
