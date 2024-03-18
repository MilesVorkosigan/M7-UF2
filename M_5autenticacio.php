<?php
define("USUARI", "admin"); //Definim nom d'usuari vàlid
define("PASSWORD", "admin"); //Definim contrsenya vàlida
if(isset($_POST['enviar'])){
    //cas que hem omplert formulari Acces
    if($_POST["usuari"] == USUARI && $_POST["contrasenya"] == PASSWORD){
        session_start();
        if(isset ($_POST["saveCookies"])){
            echo'<div class= "avis">Guardat constrasenya i usuari</div>';
            setcookie('usuari',$_POST["usuari"]);
            setcookie('contrasenya',$_POST["contrasenya"]);
        }else{
            echo '<div class="avis">No guardades les dades</div>';
        }
    
        $_SESSION["ultimAcces"] = time(); //Inicialitzem la data d'inici de sessió
    
        //Guardem les dades de l'usuari autenticat en la sessió
        $_SESSION["usuari"] = $_POST["usuari"];
        $_SESSION["contrasenya"] = $_POST["contrasenya"];
        header("Location: M_5Aplicacio.php");
    }else{
    //Si l'autenticació no és correcte...
    echo('<h4>Dades No Correctes</h4>');
    header("location: index.php"); //Retornem a la pàgina inicial.
    exit();
    }

}
/* if (isset($_POST["usuari"]) && isset($_POST["contrasenya"]) && $_POST["usuari"] == USUARI && $_POST["contrasenya"] == PASSWORD) {//Si l'autenticació és correcte...
    session_start(); //Iniciem sessió.
    if($_POST["saveCookies"]=='1'){
        echo'<div class= "avis">Guardat constrasenya i usuari</div>';
        setcookie('usuari',$_POST["usuari"]);
        setcookie('contrasenya',$_POST["contrasenya"]);
    }else{
        echo '<div class="avis">No guardades les dades</div>';
    }

    $_SESSION["ultimAcces"] = time(); //Inicialitzem la data d'inici de sessió
    
    //Guardem les dades de l'usuari autenticat en la sessió
    $_SESSION["usuari"] = $_POST["usuari"];
    $_SESSION["contrasenya"] = $_POST["contrasenya"];

    //Mostrem la pàgina de l'aplicació
    //header("Location: M_5Aplicacio.php");
    echo($_COOKIE['usuari']);
} else { 
    //Si l'autenticació no és correcte...
    echo('<h4>Dades No Correctes</h4>');
    header("location: index.php"); //Retornem a la pàgina inicial.
}
 */