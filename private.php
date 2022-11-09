<?php
session_start();

if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true){
    header("location: login.html"); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include ('layout/meta-no-js.php')?>
    </head>
    <body>
        <?php include ('layout/header.php'); 

            require_once ('config.php');//DATABASE CONNECTION DATA

            echo '<div class="private">';
            echo "<h1>Ciao " . $_SESSION['nome'] . " ecco i tuoi eventi.</h1>";
                echo '<div class="events">';
                    $email=$_SESSION['email'];
                    $sql_select = "SELECT * FROM eventi WHERE attendees LIKE '%$email%'";
                    $result = mysqli_query($connessione,$sql_select);
                    $events = $result->fetch_all(MYSQLI_ASSOC);
                    if (count($events) > 0){
                        foreach ($events as $event){
                            echo '<div class="event">';
                            echo '<h2>'.$event['nome_evento'].'</h2>';
                            echo '<button type="button">JOIN</button>';
                            echo '</div>';
                        }
                    }else{
                            echo '<h3>Non hai eventi</h3>';
                        }
                echo '</div>';
                echo '<div class="log-out">';
                    echo '<a class="log-register logout" href="logout.php">Disconnetti</a>';
                echo '</div>';
            echo '</div>';
        ?>

        <?php include ('layout/background.php'); 
        ?>
    </body>
</html>