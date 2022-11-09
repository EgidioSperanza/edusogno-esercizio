<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include ('layout/meta-plus-link.php')?>
    </head>
    <body>
        <?php include ('layout/header.php'); 
            require_once ('config.php');//DATABASE CONNECTION DATA

            $email = $connessione->real_escape_string ($_POST['email']);
            $password = $connessione->real_escape_string ($_POST['password']);

            if($_SERVER ["REQUEST_METHOD"] === "POST"){

                $sql_select = "SELECT * FROM utenti WHERE email = '$email'";
                if($result = $connessione->query($sql_select)){
                    if($result->num_rows == 1){
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        if(password_verify($password,$row['password'])){
                            session_start();

                            $_SESSION['loggato'] = true;
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['nome'] = $row['nome'];
                            $_SESSION['email'] = $row['email'];

                            header("location: private.php");
                        }else{
                            echo '<div class="register">';
                            echo '<p style="background-color:#FFCCCB; padding:10px">La password inserita non è corretta.</p>';
                            echo 'Sarai reindirizzato alla pagina di Login automaticamente.';
                            echo '</div>';
                            header('Refresh: 5; URL=index.php');
                        }
                    }else{
                        echo '<div class="register">';
                        echo '<p style="background-color:#FFCCCB; padding:10px">L\'email inserita non risulta registrata.</p>';
                        echo 'Sarai reindirizzato alla pagina di Login automaticamente.';
                        echo '</div>';
                        header('Refresh: 5; URL=index.php');
                    }
                }else{
                    echo '<div class="register">';
                    echo '<p style="background-color:#FFCCCB; padding:10px">Errore in fase di Log-in, riprovare più tardi o contattare l\'amministratore.</p>';
                    echo '<a href="logout.php">Torna alla pagina di Login.</a>';
                    echo '</div>';
                }

                $connessione->close();
            };
            include ('layout/background.php'); 
        ?>
    </body>
</html>
