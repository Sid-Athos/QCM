<?php
    if (isset($_GET["choix"])) 
    {
        foreach ($_GET as $key => $value) 
        {
            for ($i=0; $i < count($_SESSION['Commandes']) ; $i++) 
            { 
                if(array_key_exists($key, $_SESSION['Commandes'][$i])) 
                {
                    if($_GET["choix"] === "ajout") 
                    {
                        $_SESSION['Commandes'][$i][$key] += intval($value);
                        if($value > 1) 
                        {
                            echo "$value $key ont été aujoutés à votre Panier";
                        }
                    }
                    else 
                    {
                        $_SESSION['Commandes'][$i][$key] -= intval($value);
                        if($value > 1) 
                        {
                            echo "$value $key ont été retiré de votre Panier";
                        }
                    }
                }
            }
        } 
    }
    $_POST['choice'] = "lol";
    $_POST['mod_q'] = "yes";
    $word = "dsdqsd/dsiujqdgisq/duisgdigdq.jpg";
    $pattern = "%.jpg$%";
    
    if(preg_match($pattern,$word)){
        var_dump($_POST);
    }
    switch(isset($_POST)):
        case(isset($_POST['choice'])):
                echo "<h1>lol</h1><br>";
            break;
        case(isset($_POST['mod_q'])):
                echo "fdiusqhdiuqsguid";
            break;
        default:
    endswitch;



?>