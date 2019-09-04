<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
               <style>
            body{
                background-image: url("imagenes/principal.png");
                background-repeat: no-repeat;
            }
           
            #log{
                text-align: center;
                border:  solid 3px black;
                width: 500px;
                height: 340px;
                margin-left: 1000px;
                margin-top: 300px;
            }
            h1{
                width: 200px;
                text-align: center;
                background-color: black;
                color: white;
                font: oblique bold 230% cursive;
                margin-left: 150px;
            }
            p{
              font: oblique bold 130% cursive ;
              color: white;
              background-color: black;
            }
               [type="submit"]{
                width: 140px;
                height: 30px;
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
        </style>
    </head>
    <body>
        <form method="POST" action="index.php">
           <div id="log">
            <h1>REGISTRO</h1>
            <p>Nombre:</p>
            <input type="text" name="nombreReg">
            <br>
            <br>
            <p>Contraseña:</p>
            <input type="text" name="contraReg">
            <br>
            <br> 
            <input type="submit" name="registro" value="Registrarse">
            <input type="submit" name="volver" value="Volver a login">
            </div>
        </form>
    </body>
</html>
