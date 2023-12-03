<html>
    <head>
       <h2> Esborran Dades</h2>
    </head>
    <body>
        <?php
            setcookie("usuari", "");	
            setcookie("contrasenya", ""); 
            header("Location: index.php");
        ?>
    </body>
</html>
