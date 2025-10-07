 <?php
    require_once ('modele/modele.php')
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Air France </title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    
    <header>
        <img class="logo" src="images/air_france_logo.png">
        <h1> Bienvenue, nous sommes Air France et vous êtes sur notre site internet !</h1>
        <div class="block-header">
            <img class="photo-header" src="images/adrien.jpg" title="Adrien RUSAOUEN">
            <img class="photo-header" src="images/maurane.jpg" title="Maurane COMOÉ">
            <img class="photo-header" src="images/rayan.jpg" title="Rayan BENNACEUR">
        </div>    

    </header>

    <div class="block">
        <nav>
            <a class="merde" href="index.php?page=1"> Home </a> <br>
            <a class="merde" href="index.php?page=2"> Pilote </a> <br>
            <a class="merde" href="index.php?page=3"> Avion </a> <br>
            <a class="merde" href="index.php?page=4"> Vol </a> <br>
            <a class="merde" href="index.php?page=5"> Voyageur </a> <br>
            <a class="merde" href="index.php?page=6"> Billet </a> <br>
        </nav>

        <main>
            <center>
                <?php
                if (isset($_GET['page'])){
                    $page = $_GET['page']; 
                }else {
                    $page = 1; 
                }

                switch($page){
                    case 1 : require_once ("home.php"); break;
                    case 2 : require_once ("pilote.php"); break; 
                    case 3 : require_once ("avion.php"); break;
                    case 4 : require_once ("vol.php"); break;
                    case 5 : require_once ("voyageur.php"); break;
                    case 6 : require_once ("billet.php"); break;
                    default : require_once ("home.php"); break;
                }
                ?>
            </center>
        </main>
    
    </div>


    <footer>
    <center>
        <div class="block-footer1">
            <h1> Nos Coordonnées </h1>
            <div class="block-footer2">
                <a href="https://www.linkedin.com/in/rayan-bennaceur-95729b289/" target="_blank">
                    <img class="logo-footer" src="images/linkedin.png">
                </a>
                <a class="mail" href="" target="_blank"> adrien.maurane.rayan@contact.fr </a>

                <a href="https://github.com/" target="_blank">
                    <img class="logo-footer" src="images/github.png">
                </a>
            </div>
            <p>2025© Adrien, Maurane, Rayan</p>
        </div>
    </center>
    </footer>

</body>
</html>